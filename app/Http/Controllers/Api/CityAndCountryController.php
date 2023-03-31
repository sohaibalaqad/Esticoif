<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CityAndCountryController extends Controller
{
    public function getCountry(){
        $country = Country::with('cities')->get();
        return response()->json([
            'status' => true,
            'message' => 'All country and city',
            'country' => $country
        ], 200);
    }
}
