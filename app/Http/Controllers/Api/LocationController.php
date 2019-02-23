<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCountries()
    {
        return Country::all()->map(function ($item){
            return ['id'=>$item->id,'name'=>$item->translation];
        });
    }

    public function getCities()
    {
        return City::all()->map(function ($item){
            return ['id'=>$item->id,'name'=>$item->translation];
        });
    }

    public function grtRegions()
    {
        return District::all()->map(function ($item){
            return ['id'=>$item->id,'name'=>$item->translation];
        });
    }
}
