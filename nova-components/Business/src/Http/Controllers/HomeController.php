<?php

namespace Marketplace\Business\Http\Controllers;

use App\Models\Business\Business;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Schema;


class HomeController extends Controller
{


    public function index()
    {
        $statuses = Business::getStatuses();

        $businesses = DB::table('businesses')->select([
            'id',
            'name',
            'status',
            'price',
            'percent',
        ]);

        return DataTables::query($businesses)
            ->editColumn('name', function ($object) {
                return json_decode($object->name, true);
            })
            ->editColumn('price', function ($object) {
                return json_decode($object->price, true);
            })
            ->editColumn('percent', function ($object) {
                return $object->percent . '%';
            })
            ->addColumn('edit', function ($businesses) {
                return 'edit';
            }, false)
            ->addColumn('sale', function ($businesses) {
                return 'sale';
            }, false)
            ->filter(function ($query) {
                if (request()->has('status')) {
                    $status = request()->get('status');
                    if ($status != "")
                        $query->where('status', request()->get('status'));
                }
                if (request()->has('type')) {
                    $status = request()->get('type');
                    if ($status != "")
                        $query->where('type', request()->get('type'));
                }
            }, true)
            ->editColumn('status', function ($business) use ($statuses) {
                return $statuses[$business->status];
            })
            ->rawColumns(['edit'])
            ->make(true);
    }

    public function get(Business $business)
    {
        $data['options'] = $business->options;
        unset($business->options);

        $images = $business->getMedia('business/' . auth()->user()->id);
        $data['images'] = [];
        foreach ($images as $i => $image) {
            $data['images'][$i]['url'] = $image->getFullUrl();
            $data['images'][$i]['size'] = $image->size;
            $data['images'][$i]['image'] = 'business/' . auth()->user()->id . '/' . $image->file_name;
            $data['images'][$i]['type'] = $image->mime_type;
            $data['images'][$i]['name'] = $image->file_name;
        }
        $business->country_id = $business->city->country_id;
        $data['business'] = $business;

        return $data;
    }

    public function update(Request $request, Business $business)
    {
        Schema::disableForeignKeyConstraints();
        $businessData = $request->get('business');
        $business->update($businessData);
//        foreach ($businessData['images'] as $image) {
//            $business->addMedia(storage_path('app/' . $image))->toMediaCollection('business/' . auth()->user()->id);
//        }
        Schema::enableForeignKeyConstraints();
        return response()->json(['status' => 'ok']);
    }
}
