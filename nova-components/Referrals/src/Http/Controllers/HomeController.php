<?php

namespace Marketplace\Referrals\Http\Controllers;

use DataTables;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $invitations = DB::table('invitations')
            ->leftJoin('users', 'users.id', '=', 'invitations.partner_id')
            ->leftJoin('partners', 'partners.id', '=', 'invitations.partner_id')
            ->leftJoin('campaigns', 'campaigns.id', '=', 'invitations.campaign_id')
            ->leftJoin('campaign_resources', 'campaign_resources.id', '=', 'invitations.campaign_resource_id')
            ->select([
                'invitations.id',
                'invitations.user_id',
                'invitations.partner_id',
                'invitations.campaign_id',
                'invitations.campaign_resource_id',
                'users.first_name',
            ])->get();
        return DataTables::collection($invitations)
            ->addColumn('edit', function ($invitation) {
                $btns = '<button class="btn btn-danger" data-url=""><i class="fa fa-trash"></i></button> &nbsp;';
                return $btns;
            }, false)
            ->rawColumns(['edit'])
            ->make(true);
    }
}
