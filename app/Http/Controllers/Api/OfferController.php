<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Position;
use App\Models\Provider;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

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

            $position = Position::select('lang','lat')->where('userId', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();
            $services = ServiceUser::select('orderId', 'price', 'id')->where('userId', $user->id)->get();
            $serviceUserIds = $services->pluck('id')->toArray();
            $offers = Offer::whereIn('serviceUserId', $serviceUserIds)->whereIn('status', [0,1])->get();

            return response()->json([
                'status' => true,
                'message' => 'get all offers successful',
                'position' => $position,
                'user' => [
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                ],
                'offers' => $offers,
                'services'   =>   $services
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

            Offer::create([
                'providerId' => $provider->id,
                'serviceUserId' => $serviceUser->id,
                'price' => $request->price,
                'status' => 0,
            ]);

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
}
