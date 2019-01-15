<?php

namespace Marketplace\Referrals\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use DataTables;
use DB;

class HomeController extends Controller
{

    public function index()
    {
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
                $btns = '<button class="btn btn-danger" data-url=""><i class="fa fa-trash"></i></button> &nbsp;';
                return $btns;
            }, false)
            ->rawColumns(['edit'])
            ->make(true);
    }
}
