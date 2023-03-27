<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserTypeController;

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

    Route::resource('countries' , CountryController::class);
    Route::resource('cities' , CityController::class);
    Route::resource('user-types' , UserTypeController::class);
});
