<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\Campaign;
use App\Models\Referral\Invitation;
use App\Models\Referral\Partner;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function bookmark(Request $request)
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();
        $campaign_id = $request->get('campaign_id');
        $campaign = Campaign::find($campaign_id);
        $partner->bookmarks()->toggle($campaign);
        $data['bookmark'] = ($campaign->bookmarker->count() > 0) ? true : false;
        return $data;
    }

    public function index(Request $request)
    {
        $tab = $request->get('tab');
        $query = $request->get('query');
        $partner = Partner::where('user_id', auth()->user()->id)->first();
        $builder = Campaign::where('status', Campaign::STATUS_APPROVED)
            ->with('invitations')
            ->with('targets');
        if(!empty($query)){
            $builder->where('name','like',"%$query%");
        }
        if ($tab == 'active') {
            $builder->whereHas('invitations', function ($q) {
                $q->where('partner_id', auth()->user()->id);
            });
        }
        if ($tab == 'new') {
            $builder->latest();
        }
        if ($tab == 'favorite') {
            $builder->whereHas('bookmarker', function ($q) {
                $q->where('partner_id', auth()->user()->id);
            });
        }
        $campaigns = $builder->get();
        $campaigns->map(function ($campaign) use ($partner) {

            $cplMin = $campaign->targets->min('cpl');
            $cplMax = $campaign->targets->max('cpl');
            $cpl = ($cplMin == $cplMax) ? $cplMin : $cplMin . '-' . $cplMax;
            $campaign->cpl = $cpl;

            $cpsMin = $campaign->targets->min('cps');
            $cpsMax = $campaign->targets->max('cps');
            $cps = ($cpsMin == $cpsMax) ? $cpsMin : $cpsMin . '-' . $cpsMax;
            $campaign->cps = $cps;

            $campaign->bookmark = ($campaign->bookmarker->count() > 0) ? true : false;
            return $campaign;
        });
        return $campaigns;
    }

    public function get($id)
    {
        $offer = Campaign::with('country')
            ->with('referable')
            ->with('targets')
            ->with('targets.country')
            ->with('conditions')
            ->with('resources')
            ->find($id);
        return response()->json($offer);
    }

    public function invitationCreate(Request $request)
    {
        if ($request->has('id')) {
            //dd($request->get('sub_account'));
            $invitation = Invitation::find($request->get('id'));
            $invitation->campaign_resource_id = $request->get('resource_id');
            $invitation->sub_account = $request->get('sub_account');
            $invitation->save();
        } else {
            $invitation = Invitation::create([
                'partner_id'           => auth()->user()->id,
                'campaign_id'          => $request->get('campaign_id'),
                'campaign_resource_id' => $request->get('resource_id'),
                'token'                => Invitation::makeToken(),
            ]);
        }
        return $invitation;
    }

}
