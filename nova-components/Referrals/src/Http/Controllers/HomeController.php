<?php

namespace Marketplace\Referrals\Http\Controllers;

use App\Models\Referral\Invitation;
use App\Models\Referral\InvitationCounter;
use Carbon\Carbon;
use DataTables;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $dates = DB::table('invitation_counter')
            ->select(['*',DB::raw('DATE(created_at) as created')])
            ->get()->groupBy('created');
        $data = [];
        foreach ($dates as $date => $collection){
            $row['date'] = $date;
            $row['click'] = $collection->sum('count');
            $row['unique'] = $collection->groupBy('token')->count();
            $row['regs'] = $collection->where('status','>=','1')->count();
            $data[] = $row;
        }
        return DataTables::collection(collect($data))
            ->make(true);
    }

    public function statistics()
    {
        $subYear = Carbon::now()->subYear();
        $subMonth = Carbon::now()->subMonth();
        $subWeek = Carbon::now()->subWeek();

        $data['clickCountYear'] = InvitationCounter::where('created_at','>=',$subYear)->sum('count');
        $data['clickCountMonth'] = InvitationCounter::where('created_at','>=',$subMonth)->sum('count');
        $data['clickCountWeek'] = InvitationCounter::where('created_at','>=',$subWeek)->sum('count');

        $data['regCountYear'] = InvitationCounter::where('created_at','>=',$subYear)->where('status','>',0)->count();
        $data['regCountMonth'] = InvitationCounter::where('created_at','>=',$subMonth)->where('status','>',0)->count();
        $data['regCountWeek'] = InvitationCounter::where('created_at','>=',$subWeek)->where('status','>',0)->count();

        return response()->json($data);
    }
}
