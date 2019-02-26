<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BrokerController extends Controller
{

    public function getSummary()
    {


        $partner = Partner::where('user_id', auth()->user()->id)->first();

        $counters = InvitationCounter::whereHas('invitation', function ($q) use ($partner) {
            $q->where('partner_id', $partner->id);
        })->get()->groupBy('invitation.partner_id');
        $data = $counters->map(function ($counter) {
            $data['views'] = $counter->sum('count');
            $data['hits'] = $counter->count();
            $data['open_leads'] = $counter->sum('open_leads');
            $data['approved_leads'] = $counter->sum('approved_leads');
            $data['payed_targets'] = $counter->sum('payed_targets');
            $data['open_commission'] = $counter->sum('open_commission');
            $data['approved_commission'] = $counter->sum('approved_commission');
            return $data;
        });
        return response()->json($data);
    }

    public function getOffersSummary()
    {
        $partner = Partner::where('user_id', auth()->user()->id)->first();
        $data['views'] = 0;
        $data['hits'] = 0;


        $campaigns = InvitationCounter::with('invitation')->with('invitation.campaign')->whereHas('invitation', function ($q) use ($partner) {
            $q->where('partner_id', $partner->id);
        })->get()->groupBy('invitation.campaign.id');

        $data = $campaigns->map(function ($campaign) {
            $data['views'] = $campaign->sum('count');
            $data['hits'] = $campaign->count();
            $data['open_leads'] = $campaign->sum('open_leads');
            $data['approved_leads'] = $campaign->sum('approved_leads');
            $data['payed_targets'] = $campaign->sum('payed_targets');
            $data['open_commission'] = $campaign->sum('open_commission');
            $data['approved_commission'] = $campaign->sum('approved_commission');
            return $data;
        });

        return response()->json($data);
    }

    public function getChartData(Request $request)
    {
        $req = $request->get('data');
        $format = 'Y-m-d H:i';
        if ($request->get('type') == 'minute') {
            $format = 'Y-m-d H:i';
        } elseif ($request->get('type') == 'hour') {
            $format = 'Y-m-d H';
        }
        $invitations = InvitationCounter::whereHas('invitation', function ($q) use ($req) {
            $q->where('partner_id', Partner::where('user_id', auth()->user()->id)->first()->id);
        });
        if ($request->get('time')) {
            $invitations->where('updated_at', '>=', $request->get('time'));
        } else {
            $invitations->where('updated_at', '>=', Carbon::now()->subMinute(10)->format($format));
        }

        $dates = $invitations->get();

        $labels = $dates->groupBy(function ($invitation) use ($format) {
            return $invitation->updated_at->format($format);
        });
        $dates = $this->getLabels($request->get('type'));

        $results = $labels->transform(function ($invitation, $key) {
            $views = 0;
            $clicks = 0;
            $registered = 0;
            foreach ($invitation as $item) {
                $views += $item->count;
                $clicks++;
                if ($item->status == InvitationCounter::STATUS_REGISTERED) {
                    $registered++;
                }
            }
            return ['date' => $key, 'views' => $views, 'clicks' => $clicks, 'registered' => $registered];
        });
        foreach ($results as $key => $result) {
            $dates[$key] = $result;
        }
        return response()->json($dates);
    }

    protected function getLabels($type = 'minute')
    {
        $data = [];

        if ($type == 'minute') {
            $start = Carbon::now()->subMinutes(10);
            $end = Carbon::now();
            for ($d = $start; $d < $end; $d->addMinute()) {
                $data[$d->format('Y-m-d H:i')] = ['date' => $d->format('Y-m-d H:i'), 'views' => 0, 'clicks' => 0, 'registered' => 0];
            };
        } elseif ($type == 'hour') {
            $start = Carbon::now()->subHours(10);
            $end = Carbon::now();
            for ($d = $start; $d < $end; $d->addHour()) {
                $data[$d->format('Y-m-d H')] = ['date' => $d->format('Y-m-d H'), 'views' => 0, 'clicks' => 0, 'registered' => 0];
            };
        }
        return $data;
    }


}
