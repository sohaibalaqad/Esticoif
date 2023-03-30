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
