<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services', [
            'services' => Service::all()
        ]);
    }

    public function list()
    {
        return Service::with('category')->get();
    }
}
