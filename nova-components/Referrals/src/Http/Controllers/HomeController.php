<?php

namespace Marketplace\Referrals\Http\Controllers;

use App\Models\Auth\User;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use App\Nova\Business;
use Carbon\Carbon;
use DataTables;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $partners = Partner::with(['user', 'invitations', 'invitations.campaign', 'invitations.counters'])
            ->get();

        foreach ($partners as $partner) {
            $sum = 0;
            $percent = 0;
            $clicks = 0;
            $uniq = 0;
            $regs = 0;
            $partner->name = $partner->user->first_name . ' ' . $partner->user->last_name;
            $partner->reg_date = Carbon::parse($partner->user->created_at)->format("d.m.Y");
            foreach ($partner->invitations as $invitation) {
                $counters = $invitation->counters;
                $clicks += $counters->sum('count');
                $uniq += $counters->count();
                $regs += $counters->where('status', '>=', 1)->count();
                foreach ($counters->where('status', 2) as $counter) {
                    if ($invitation->campaign->type == Campaign::TYPE_FRANCHISE) {
                        $sum += Franchise::find($invitation->campaign->target_id)->price;
                    }
                    if ($invitation->campaign->type == Campaign::TYPE_BUSINESS) {
                        $sum += Business::find($invitation->campaign->target_id)->price;
                    }
                    //TODO Services
                }
            }
            $partner->clicks = $clicks;
            $partner->uniq = $uniq;
            $partner->regs = $regs;
            $partner->revenue = $sum;
            $partner->percent = $sum * 0.1;
        }
        return DataTables::collection($partners)
            ->editColumn('revenue', function ($partner) {
                return number_format($partner->revenue, 0, ',', ' ') . 'р';;
            })
            ->editColumn('percent', function ($partner) {
                return number_format($partner->percent, 0, ',', ' ') . 'р';;
            })
            ->make(true);
    }

    public function getSellersBuyers()
    {
        $data['sellers'] = User::role('Продавец')->select('id', DB::raw("CONCAT(email,' \"',first_name,'\"') AS name"))->get();
        $data['buyers'] = User::role('Покупатель')->select('id', DB::raw("CONCAT(email,' \"',first_name,'\"') AS name"))->get();
        return response()->json($data);
    }

    public function getCampaigns()
    {
        $campaigns = Campaign::select('id', 'name')->get();

        return response()->json($campaigns);
    }

    public function getTypes()
    {
        $types = Campaign::getTypes();

        return response()->json($types);
    }

    public function statistics()
    {
        $subYear = Carbon::now()->subYear();
        $subMonth = Carbon::now()->subMonth();
        $subWeek = Carbon::now()->subWeek();

        $data['clickCountYear'] = InvitationCounter::where('created_at', '>=', $subYear)->sum('count');
        $data['clickCountMonth'] = InvitationCounter::where('created_at', '>=', $subMonth)->sum('count');
        $data['clickCountWeek'] = InvitationCounter::where('created_at', '>=', $subWeek)->sum('count');

        $data['regCountYear'] = InvitationCounter::where('created_at', '>=', $subYear)->where('status', '>', 0)->count();
        $data['regCountMonth'] = InvitationCounter::where('created_at', '>=', $subMonth)->where('status', '>', 0)->count();
        $data['regCountWeek'] = InvitationCounter::where('created_at', '>=', $subWeek)->where('status', '>', 0)->count();

        return response()->json($data);
    }
}
