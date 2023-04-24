<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Document;
use App\Models\Position;
use App\Models\Provider;
use App\Models\Token;
use App\Models\User;
use App\Models\UserType;
use App\Models\Verification;
use App\Notifications\SMSNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Nette\Utils\Image;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validUserTypeIds = UserType::pluck('id')->toArray();
        $validUserCityIds = City::pluck('id')->toArray();

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'gender' => 'required|string|in:male,female',
            'typeId' => ['required', 'integer', Rule::in($validUserTypeIds)],
            'cityId' => ['required', 'integer', Rule::in($validUserCityIds)],
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
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'city_id' => $request->input('cityId'),
            'typeId' => $request->input('typeId'),
            'fcm_token' => $request->input('fcm_token'),
        ]);

        $token = Token::create([
            'token' => Str::random(60),
            'userId' => $user->id,
        ]);

        $position = Position::create([
            'lang' => 0,
            'lat' => 0,
            'userId' => $user->id
        ]);

        $code = Verification::create([
            'code' => rand(10000, 99999),
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

    public function register_2(Request $request)
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
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }

        // Validate input
        $validator = Validator::make($request->all(), [
            'idImage1' => 'required',
            'idImage2' => 'required',
            'service_type' => 'required|in:barber,hairdresser,chaser,beautician',
            'listOfDocuments' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $provider = Provider::create([
            'idImage1' => $request->input('idImage1'),
            'idImage2' => $request->input('idImage2'),
            'service_type' => $request->input('service_type'),
            'userId' => $user->id
        ]);

        $documents = $request->input('listOfDocuments');
        foreach ($documents as $document) {
            $documentModel = new Document();
            $documentModel->document = $document;
            $documentModel->providerId = $provider->id;
            $documentModel->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Register completed successfully',
        ]);
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

    public function addBalance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'balance' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all(),
            ], 400);
        }

        $provider = Provider::findOrFail($request->id);
        $provider->update([
            'balance' => $provider->balance + $request->balance
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Add balance successful',
        ], 200);
    }

    public function deleteAccount(Request $request)
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
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid token',
            ], 401);
        }

        $user->update([
            'act' => 5
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Deleted account successfully',
        ]);
    }

}
