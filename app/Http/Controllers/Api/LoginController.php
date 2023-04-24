<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

}
