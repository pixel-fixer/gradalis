<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessStoreRequest;
use App\Models\Business\Business;
use Illuminate\Support\Facades\Schema;

class BusinessController extends Controller
{

    public function index()
    {
        return view('business.index');
    }

    public function show(Business $business)
    {
        $business->show_count += 1;
        $business->save();
        $data['business'] = $business;

        return view('business.show', $data);
    }

    public function create()
    {
        return view('business.create');
    }

    public function store(BusinessStoreRequest $request)
    {
        Schema::disableForeignKeyConstraints();
        $businessData = $request->get('business');

        $business = Business::create($businessData);
        foreach ($businessData['images'] as $image) {
            $business->addMedia(storage_path('app/' . $image))->toMediaCollection('business/' . auth()->user()->id);
        }

        Schema::enableForeignKeyConstraints();
        return response();
    }

    public function edit(Business $business)
    {
        $business->country_id = $business->country_id;
        $business->images = [];
        $data['business'] = $business;
        return view('business.edit', $data);
    }

    public function update(BusinessStoreRequest $request, Business $business)
    {
        Schema::disableForeignKeyConstraints();
        $businessData = $request->get('business');
        foreach ($businessData['images'] as $image) {
            $business->addMedia(storage_path('app/' . $image))->toMediaCollection('business/' . auth()->user()->id);
        }
        $business->update($businessData);

        Schema::enableForeignKeyConstraints();
        return response();
    }
}
