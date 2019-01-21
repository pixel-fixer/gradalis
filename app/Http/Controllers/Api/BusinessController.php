<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function getBusinesses(){
        $businesses = Business::all();
        return response()->json($businesses);
    }
}
