<?php

namespace Marketplace\Referrals\Http\Controllers;

use App\Models\Auth\User;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
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
            ->leftJoin('users','invitation_counter.user_id','=','users.id')
            ->join('invitations','invitation_counter.invitation_id','=','invitations.id')
            ->join('campaigns','invitations.campaign_id','=','campaigns.id')
            ->select([
                DB::raw('sum(invitation_counter.count) as click'),
                DB::raw('count(distinct(invitation_counter.token)) as uniq'),
                DB::raw('count(CASE WHEN invitation_counter.status >= 1  THEN 1 ELSE 0 END) as regs'),
                DB::raw('DATE(invitation_counter.created_at) as created')
            ])
            ->groupBy('created');

        return DataTables::query($dates)
            ->filter(function ($query) {
                if (request()->has('campaign')) {
                    $campaign = request()->get('campaign');
                    if ($campaign != "")
                        $query->where('campaign_id', $campaign);
                }
                if (request()->has('seller')) {
                    $seller = request()->get('seller');
                    if ($seller != "")
                        $query->where('user_id', $seller);
                }
                if (request()->has('type')) {
                    $type = request()->get('type');
                    if ($type != "") {
                        $query->where('campaigns.type', $type);
                        //dd($query->toSql());
                        }
                }
            },true)
            ->make(true);
    }

    public function getSellersBuyers(){
        $data['sellers'] = User::role('Продавец')->select('id',DB::raw("CONCAT(email,' \"',first_name,'\"') AS name"))->get();
        $data['buyers'] = User::role('Покупатель')->select('id',DB::raw("CONCAT(email,' \"',first_name,'\"') AS name"))->get();
        return response()->json($data);
    }

    public function getCampaigns(){
        $campaigns = Campaign::select('id','name')->get();

        return response()->json($campaigns);
    }

    public function getTypes(){
        $types = Campaign::getTypes();

        return response()->json($types);
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
