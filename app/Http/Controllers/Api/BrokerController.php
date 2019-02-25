<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BrokerController extends Controller
{

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
