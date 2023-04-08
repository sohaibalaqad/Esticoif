<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Position;
use App\Models\Provider;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use App\Notifications\makeNewOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function getOffers(Request $request)
    {
        $token = Token::where('token', $request->input('token'))->first();
        if ($token){
            $user = User::findOrFail($token->userId);
            if ($user && $user->act == null){
                return response()->json([
                    'status' => false,
                    'message' => 'The account has not been verified',
                ], 403);
            }

            // --------------
            $results = DB::select("
                SELECT
                    *
                FROM
                    (
                    SELECT
                        offers.orderID,
                        offers.price AS oprice,
                        offers.status AS ostatus,
                        offers.id AS oid,
                        providers.id AS pid,
                        providers.userId,
                        users.firstName,
                        users.lastName,
                        positions.lang,
                        positions.lat
                    FROM
                        offers
                    INNER JOIN providers ON offers.providerId = providers.id
                    INNER JOIN users ON users.id = providers.userId
                    LEFT JOIN positions ON users.id = positions.userId
                ) AS q1
                INNER JOIN(
                    SELECT providers.id,
                        AVG(service_user.evaluation)
                    FROM
                        providers
                    INNER JOIN offers ON providers.id = offers.providerId
                    INNER JOIN service_user ON offers.orderID = service_user.orderId
                    GROUP BY
                        providers.id
                ) AS q2
                ON
                    q1.pid = q2.id
                WHERE
                    q1.orderId IN(
                    SELECT DISTINCT
                        (service_user.orderId)
                    FROM
                        tokens
                    INNER JOIN service_user ON tokens.userId = service_user.userId
                    WHERE
                        tokens.token = ?
                        AND service_user.status = 1
                ) AND q1.ostatus < 2;
                ", [$request->token]);


            return response()->json([
                'status' => true,
                'message' => 'get all offers successful',
                'data' => $results,
            ], 200);

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }

    public function makeOffer(Request $request)
    {
        $token = Token::where('token', $request->input('token'))->first();
        if ($token){
            $user = User::findOrFail($token->userId);
            if ($user && $user->act == null){
                return response()->json([
                    'status' => false,
                    'message' => 'The account has not been verified',
                ], 403);
            }

           // your Code
            $provider = Provider::where('userId', $user->id)->first();
            $serviceUser = ServiceUser::where('orderId', $request->orderId)->latest()->first();

            $offer = Offer::create([
                'providerId' => $provider->id,
                'serviceUserId' => $serviceUser->id,
                'price' => $request->price,
                'orderId' => $request->orderId ?? Offer::max('orderId') + 1,
                'status' => 0,
            ]);

            sendNotificationForUser($serviceUser->userId, 'تقديم عرض', 'تم تقديم عرض جديد');

            return response()->json([
                'status' => true,
                'message' => 'Make offer successful',
            ], 200);

            // End your Code

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }

    public function changeOfferStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required|string|max:255',
            'offerId' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $offers = Offer::where('orderId', $request->orderId)->get();

        foreach ($offers as $offer){
            if ($offer->id == $request->offerId){
                $offer->update([
                    'status' => '1'
                ]);
            }else{
                $offer->update([
                    'status' => 2
                ]);
            }
        }

        $provider = Provider::findOrFail($offer->providerId);
        sendNotificationForUser($provider->userId, 'حالة العرض','تم قبول العرض الخاص بك');

        return response()->json([
            'status' => true,
            'message' => 'Change status offer successful',
        ], 200);

    }

    public function cancelOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'offerId' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $offer = Offer::findOrFail($request->offerId);
        $offer->update([
            'status' => '4'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Canceled offer successful',
        ], 200);

    }
}
