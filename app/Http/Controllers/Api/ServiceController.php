<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Service;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function getServices(Request $request)
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

            $services  = Service::where('gender', $user->gender)
                ->where('city_id', $user->city_id)
                ->where('type', $request->type)
                ->paginate();

            return response()->json([
                'status' => true,
                'message' => 'get services successful',
                'services' => $services,
            ], 200);

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }

    public function requestServices(Request $request)
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

            $newRequest = ServiceUser::create([
                'userId' => $user->id,
                'serviceId' => $request->serviceId,
                'price' => $request->price,
                'color' => $request->color,
                'status' => 0,
                'orderId' => $request->orderId ?? ServiceUser::max('orderId') + 1  ,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Request new servises successful',
                'orderId' => $newRequest->orderId + 0,
            ], 200);

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }

    public function doneService(Request $request)
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

        $offer = Offer::findOrFail($request->offerId);
        $offer->update([
            'status' => '3'
        ]);

        $serviceUser = ServiceUser::where('orderId', $request->orderId)->get();

        foreach ($serviceUser as $s){
            $s->update([
                'status' => '2'
            ]);
        }

        sendNotificationForUser($serviceUser->userId, 'حالة الخدمة','تم قبول الخدمة');

        return response()->json([
            'status' => true,
            'message' => 'Service Done successful',
        ], 200);

    }

    public function cancelService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $ServiceUser = ServiceUser::findOrFail($request->id);
        $ServiceUser->update([
            'status' => '3'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Canceled Service successful',
        ], 200);

    }

    public function doneRequestService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orderId' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $serviceUser = ServiceUser::where('orderId', $request->orderId)->get();
        foreach ($serviceUser as $s){
            $s->update([
                'status' => '1'
            ]);
        }

        sendNotificationForCustomUser($request->cityId, $request->serviceType, 'طلب خدمة', 'تم طلب خدمة جديدة ');

        return response()->json([
            'status' => true,
            'message' => 'Service done request successful',
        ], 200);

    }

    public function evalService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'eval' => 'required|in:1,2,3,4,5',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $serviceUser = ServiceUser::findOrFail($request->id);
        $serviceUser->update([
            'evaluation' => $request->eval
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Service done evaluation successful',
        ], 200);

    }
}
