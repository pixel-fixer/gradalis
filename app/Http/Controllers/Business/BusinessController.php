<?php

namespace App\Http\Controllers\Business;

use App\Models\Business\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{

    public function index()
    {
        return view('business.index');
    }

    public function show(Business $business){
        return view('business.show');
    }

    public function create(){
        return view('business.create');
    }
}
