<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCountries(Request $request)
    {
        return Country::all()->map(function ($item,$key){
            return ['id'=>$item->id,'name'=>$item->translation];
        });
    }

    public function getCities(Request $request)
    {
        return City::all()->map(function ($item,$key){
            return ['id'=>$item->id,'name'=>$item->translation];
        });
    }
}
