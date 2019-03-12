<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessStoreRequest;
use App\Models\Business\Business;
use Illuminate\Http\Request;
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
        $businessData['user_id'] = auth()->user()->id;
        $business = Business::create($businessData);
        foreach ($businessData['files'] as $file) {
            //TODO: Хак для пдф, переделать
            if (isset($file['dataURL'])) {
                $business->addMediaFromBase64(
                    $file['dataURL'],
                    [
                        'image/jpg',
                        'image/jpeg',
                    ]
                )->toMediaCollection('business','business');
            }
        }

        Schema::enableForeignKeyConstraints();
        return response()->json(['status' => 'ok']);
    }

    public function edit(Business $business)
    {
        $data['business_id'] = $business->id;
        return view('business.edit', $data);
    }

    public function update(Request $request, Business $business)
    {
        Schema::disableForeignKeyConstraints();
        $businessData = json_decode($request->get('business'),true);
        $business->update($businessData);
        foreach ($request->file('files') as $file) {
            $business->addMedia($file)->toMediaCollection('business','business');
        }
        Schema::enableForeignKeyConstraints();
        return response()->json(['status' => 'ok']);
    }
}
