<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required|string|min:8',
            'newPassword' => 'required|string|min:8',
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

            if ($user && Hash::check($request->oldPassword, $user->password)) {
                $user->password = Hash::make($request->newPassword);
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Change password successful',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid old password',
                ], 401);
            }

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }
}
