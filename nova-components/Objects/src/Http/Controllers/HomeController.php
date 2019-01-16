<?php

namespace Marketplace\Objects\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use DataTables;
use DB;

class HomeController extends Controller
{

    public function sale(Request $request)
    {
        $id = $request->get('id');
        $resource = $request->get('resource');
        if($resource == 'businesses'){
            $obj = Business::find($id);
        }else{
            $obj = Franchise::find($id);
        }
        $obj->status = Business::STATUS_SOLD_OUT;
        $obj->save();
        return response()->json(['status'=>'ok']);
    }

    public function index()
    {
        $statuses = Business::getStatuses();
        $businesses = Business::select([
                'id',
                'name',
                'status',
                'price',
            ])->addSelect(DB::raw("'Бизнес' as type"))
            ->addSelect(DB::raw("'businesses' as resource"));
        $franchises = Franchise::select([
            'id',
            'name',
            'status',
            'price',
        ])->addSelect(DB::raw("'Франшиза' as type"))
            ->addSelect(DB::raw("'franchises' as resource"));
        $businesses->union($franchises);
        return DataTables::eloquent($businesses)
            ->addColumn('edit', function ($businesses) {
                return 'edit';
            }, false)
            ->addColumn('sale', function ($businesses) {
                return 'sale';
            }, false)
            ->editColumn('status',function ($business) use ($statuses){
                return $statuses[$business->status];
            })
            ->rawColumns(['edit'])
            ->make(true);
    }
}
