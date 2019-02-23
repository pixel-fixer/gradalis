<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function getPartners(Request $request)
    {
        $blocked = $request->get('blocked');
        $await = $request->get('await');
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
        $req = $request->get('data');

        $invitations = InvitationCounter::whereHas('invitation', function ($q) use ($req) {
            $q->whereIn('partner_id', $req['partners']);
        });
        if (isset($req['from']) && isset($req['to'])) {
            $invitations->where('created_at', '>=', Carbon::parse($req['from']));
            $invitations->where('created_at', '<=', Carbon::parse($req['to']));
        } else {
            $invitations->where('created_at', '>=', Carbon::now()->subMonth());
        }
        $dates = $invitations->get()
            ->groupBy(function ($invitation) {
                return $invitation->created_at->format('d-m-Y');
            });
        $data['result'] = $dates->transform(function ($invitation, $key) {
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
        return response()->json($data);
    }


}
