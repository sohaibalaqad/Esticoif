<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Service;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(Request $request)
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

            $servicesUser =  ServiceUser::where('userId', $user->id)
                ->whereIn('status', [0,1])
                ->get();
            $position = Position::where('userId', $user->id)->get();
            $services = Service::where('type', $request->serviceType)
                ->where('city_id', $request->cityId)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Make offer successful',
                'servicesUser' => $servicesUser,
                'position' => $position,
                'services' => $services,
                'user' => [
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                ]
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
