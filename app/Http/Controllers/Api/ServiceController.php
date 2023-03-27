<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceUser;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function serviceRequest(Request $request)
    {
        $validUserServiceIds = Service::pluck('id')->toArray();
        $validator = Validator::make($request->all(), [
            'serviceId' => ['required', 'integer', Rule::in($validUserServiceIds)],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $token = Token::where('token', $request->input('token'))->first();
        if ($token){
            $user = User::findOrFail($token->userId);
            if ($user && $user->act == null){
                return response()->json([
                    'status' => false,
                    'message' => 'The account has not been verified',
                ], 403);
            }

            //  here write your code

            $services  = ServiceUser::create([
                'userId' => $user->id,
                'serviceId' => $request->serviceId,
            ]);

            //  here End your code

            return response()->json([
                'status' => true,
                'message' => 'The service request has been registered successfully',
            ], 200);
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }
}
