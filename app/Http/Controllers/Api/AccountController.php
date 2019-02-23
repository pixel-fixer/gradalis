<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\Invitation;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function getPartners(Request $request)
    {
        $blocked  = $request->get('blocked');
        $await    = $request->get('await');
        $approved = $request->get('approved');
        $partners = Partner::where('apa_id', auth()->user()->id);
        if ($blocked) {
            $partners->where('status', Partner::STATUS_BLOCKED);
        }
        if ($await) {
            $partners->where('status', Partner::STATUS_AWAIT);
        }
        if ($approved) {
            $partners->where('status', Partner::STATUS_APPROUVED);
        }
        $partners = $partners->with('user')->with('user.country')->moderatedMessagesCount()->get();
        return response()->json($partners);
    }

    public function getChartData(Request $request)
    {
        $partners    = $request->get('partners');
        $invitations = InvitationCounter::whereHas('invitation', function ($q) use ($partners) {
            $q->whereIn('partner_id', $partners);
        })
        ->where('created_at','>=',Carbon::now()->subMonth())
        ->groupBy('date')->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as "clicks"'),
            DB::raw('SUM(count) as "views"'),
            DB::raw("SUM(if(status = 1, 1, 0)) AS 'registered'")
        ]);
        return response()->json($invitations);
    }


}
