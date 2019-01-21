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

        $franchises = DB::table('franchises')->select([
            'id',
            'name',
            'status',
            'price',
            'percent',
        ])->addSelect(DB::raw("'Франшиза' as type"))
            ->addSelect(DB::raw("'franchises' as resource"));
        $businesses = DB::table('businesses')->select([
            'id',
            'name',
            'status',
            'price',
            'percent',
        ])->addSelect(DB::raw("'Бизнес' as type"))
            ->addSelect(DB::raw("'businesses' as resource"))
            ->unionAll($franchises);
        $objects = DB::table(DB::raw("({$businesses->toSql()}) as objects"))
            ->mergeBindings($businesses);
        return DataTables::query($objects)
            ->editColumn('name', function ($object) {
                return json_decode($object->name, true);
            })
            ->editColumn('price', function ($object) {
                return json_decode($object->price, true);
            })
            ->editColumn('percent', function ($object) {
                return $object->percent.'%';
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
            },true)
            ->editColumn('status',function ($business) use ($statuses){
                return $statuses[$business->status];
            })
            ->rawColumns(['edit'])
            ->make(true);
    }
}
