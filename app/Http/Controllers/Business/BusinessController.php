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
        $businessData = $request->get('business');
        foreach ($businessData['images'] as $image) {
            dd(storage_path('business/'.auth()->user()->id.'/'.$image));
            //$business->addMedia(storage_path(''))->toMediaCollection('images');
        }
        $business = Business::create($businessData);

        Schema::enableForeignKeyConstraints();
        return response()->isOk();
    }

    public function edit(Business $business)
    {
        $business->country_id = $business->country_id;
        $business->images = [];
        $data['business'] = $business;
        return view('business.edit',$data);
    }

    public function update(BusinessStoreRequest $request,Business $business){

    }
}
