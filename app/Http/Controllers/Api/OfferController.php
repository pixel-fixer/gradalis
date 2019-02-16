<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\Campaign;
use App\Models\Referral\CampaignResource;
use Illuminate\Http\Request;

class OfferController extends Controller
{
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

}
