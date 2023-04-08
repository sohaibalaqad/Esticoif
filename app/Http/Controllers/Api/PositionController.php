<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Position;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function setPosition(Request $request)
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

            $position = Position::where('userId', $user->id)->first();

            $position->update([
                'lang' => $request->lang,
                'lat' => $request->lat,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Save Position successful',
            ], 200);

            // End your Code

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }
    }

    public function getColor()
    {
        $color = Color::get();

        return response()->json([
            'status' => true,
            'message' => 'Get all color successful',
            'color' => $color
        ], 200);

    }
}
