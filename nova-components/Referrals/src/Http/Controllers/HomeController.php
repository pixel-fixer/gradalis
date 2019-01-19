<?php

namespace Marketplace\Referrals\Http\Controllers;

use App\Models\Auth\User;
use App\Models\Referral\Campaign;
use App\Models\Referral\InvitationCounter;
use Carbon\Carbon;
use DataTables;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $partners = DB::table('partners')
            ->leftJoin('users', 'partners.user_id', '=', 'users.id')
            ->leftJoin('invitations', 'partners.id', '=', 'invitations.partner_id')
            ->leftJoin('invitation_counter', 'invitations.id', '=', 'invitation_counter.invitation_id')
            ->select(
                DB::raw("CONCAT(first_name,' ',last_name) AS name"),
                DB::raw("DATE_FORMAT(users.created_at, '%d.%m.%Y') as reg_date"),
                DB::raw("(select sum(invitation_counter.count) from invitation_counter where invitation_id = invitations.id) as clicks"),
                DB::raw("(select count(invitation_counter.id) from invitation_counter where invitation_id = invitations.id) as uniq"),
                DB::raw('(select count(CASE WHEN invitation_counter.status >= 1  THEN 1 ELSE 0 END) from invitation_counter where invitation_id = invitations.id) as regs')
            )
            ->groupBy('partners.id');
        return DataTables::query($partners)
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
