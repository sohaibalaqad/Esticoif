<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use App\Models\UserType;
use App\Models\Verification;
use App\Notifications\SMSNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validUserTypeIds = UserType::pluck('id')->toArray();

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|string|in:male,female',
            'typeId' => ['required', 'integer', Rule::in($validUserTypeIds)],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $user = User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'password' => Hash::make($request->input('password')),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'typeId' => $request->input('typeId'),
            'phone_number' => $request->input('phone_number'),
        ]);

        $token = Token::create([
            'token' => Str::random(60),
            'userId' => $user->id,
        ]);

        // store verification code on Codes table and send to phone
        // using this Str::randomNumber(6);


        $code = Verification::create([
            'code' => rand(100000, 999999),
            'userId' => $user->id
        ]);

//        $client = new Client(new Basic(env('VONAGE_KEY'), env('VONAGE_SECRET')));

        $basic  = new Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));
        $client = new Client($basic);

        $response = $client->sms()->send(
            new SMS($user->phone_number, env('VONAGE_SMS_FROM'), 'كود التحقق الخاص بك : ' . $code->code)
        );
//
//        $message = $response->current();
//
//        if ($message->getStatus() == 0) {
//            echo "The message was sent successfully\n";
//        } else {
//            echo "The message failed with status: " . $message->getStatus() . "\n";
//        }


//        $message = $client->message()->send([
//            'to' => $user->phone_number,
//            'from' => 'YOUR_VONAGE_NUMBER',
//            'text' => 'كود التحقق الخاص بك : ' . $code->code,
//        ]);


//        $smsNotification = new SMSNotification($code);
//        Notification::send($user, $smsNotification);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'token' => $token->token,
        ], 200);
    }

    public function validateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'code' => 'required|string|max:6',
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
            $verification = Verification::where('userId', $user->id)->latest()->first();
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }

        if ($verification && $verification->code === $request->input('code')) {
            $user->act = 1;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'User verified successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid code',
            ], 401);
        }
    }
}
