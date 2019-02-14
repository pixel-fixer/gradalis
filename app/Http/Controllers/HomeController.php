<?php

namespace App\Http\Controllers;

use App\Models\Business\Business;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['businesses_count'] = Business::whereIn('status',[Business::STATUS_APPROUVED,Business::STATUS_SOLD_OUT])->count();
        return view('home',$data);
    }
}
