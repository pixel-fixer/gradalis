<?php

namespace App\Http\Controllers\Business;

use App\Models\Business\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessStoreRequest;
use Illuminate\Support\Facades\Schema;

class BusinessController extends Controller
{

    public function index()
    {
        return view('business.index');
    }

    public function show(Business $business)
    {
        return view('business.show');
    }

    public function create()
    {
        return view('business.create');
    }

    public function store(BusinessStoreRequest $request)
    {
        Schema::disableForeignKeyConstraints();
        Business::create($request->get('business'));
        Schema::enableForeignKeyConstraints();
        return response()->isOk();
    }
}
