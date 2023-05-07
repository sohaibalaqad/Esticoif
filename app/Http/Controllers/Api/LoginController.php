<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = Token::where('userId', $user->id)->first();
            $token->update([
                'token' => Str::random(60),
            ]);

            if ($user->fcm_token != $request->input('fcm_token')){
                User::where('fcm_token', $request->input('fcm_token'))
                    ->update(['fcm_token' => null]);
            }

            $user->update([
                'fcm_token' => $request->input('fcm_token'),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'user' => [
                    'userType' => $user->userType->name,
                    'act' => $user->act,
                    'cityId' => $user->city_id,
                    'gender' => $user->gender
                ],
                'token' => $token->token,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }
    }

    public function getNotification(Request $request)
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
            $notification = DB::select("SELECT title, description, created_at FROM notifications WHERE forAll = 1 OR JSON_CONTAINS(receivers, ?)", [$user->id]);

            return response()->json([
                'status' => true,
                'message' => 'Get all notification successful',
                'notification' => $notification
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
