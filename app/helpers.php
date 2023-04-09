<?php

function sendNotificationForUser($id, $title, $body)
{
    $user = \App\Models\User::findOrFail($id);
    $firebaseToken = [$user->fcm_token];

    $SERVER_API_KEY = env('FIREBASE_KEY');

    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ]
    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

}

function sendNotificationForCustomUser($cityId, $serviceType, $title, $body)
{
//    $user = \App\Models\User::findOrFail($id);
//    $firebaseToken = [$user->fcm_token];

    $firebaseToken = \Illuminate\Support\Facades\DB::table('users')
        ->join('providers', 'users.id', '=', 'providers.userId')
        ->where('users.typeId', '=', 2)
        ->where('users.city_id', '=', $cityId)
        ->where('providers.service_type', '=', $serviceType)
        ->pluck('users.fcm_token')
        ->toArray();

    $SERVER_API_KEY = env('FIREBASE_KEY');

    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ]
    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
}
