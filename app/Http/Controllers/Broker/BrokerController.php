<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrokerController extends Controller
{

    public function index(){
        return view('broker.index');
    }

}
