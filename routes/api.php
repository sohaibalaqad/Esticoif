<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register/user', [\App\Http\Controllers\Api\RegisterController::class, 'register']);
Route::post('register-2/user', [\App\Http\Controllers\Api\RegisterController::class, 'register_2']);
Route::post('validate/user', [\App\Http\Controllers\Api\RegisterController::class, 'validateUser']);
Route::post('login', [\App\Http\Controllers\Api\LoginController::class, 'login']);
Route::post('changePassword', [\App\Http\Controllers\Api\ChangePasswordController::class, 'changePassword']);
Route::post('services', [\App\Http\Controllers\Api\ServiceController::class, 'getServices']);
Route::post('services/request', [\App\Http\Controllers\Api\ServiceController::class, 'requestServices']);
Route::get('getCountry', [\App\Http\Controllers\Api\CityAndCountryController::class, 'getCountry']);
Route::post('offers', [\App\Http\Controllers\Api\OfferController::class, 'getOffers']);
Route::post('offer/make', [\App\Http\Controllers\Api\OfferController::class, 'makeOffer']);

Route::post('offer/change/status', [\App\Http\Controllers\Api\OfferController::class, 'changeOfferStatus']);
Route::post('offer/cancel', [\App\Http\Controllers\Api\OfferController::class, 'cancelOffer']);
Route::post('services/done', [\App\Http\Controllers\Api\ServiceController::class, 'doneService']);
Route::post('services/cancel', [\App\Http\Controllers\Api\ServiceController::class, 'cancelService']);
Route::post('services/done/request', [\App\Http\Controllers\Api\ServiceController::class, 'doneRequestService']);
Route::post('services/eval', [\App\Http\Controllers\Api\ServiceController::class, 'evalService']);
Route::post('provider/add-balance', [\App\Http\Controllers\Api\RegisterController::class, 'addBalance']);
Route::post('delete-account', [\App\Http\Controllers\Api\RegisterController::class, 'deleteAccount']);
Route::post('getNotification', [\App\Http\Controllers\Api\LoginController::class, 'getNotification']);


Route::post('getOrders', [\App\Http\Controllers\Api\OrderController::class, 'getOrders']);

Route::post('setPosition', [\App\Http\Controllers\Api\PositionController::class, 'setPosition']);
Route::get('getColor', [\App\Http\Controllers\Api\PositionController::class, 'getColor']);



