<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function partnerStatusChange(Request $request)
    {
        $partner_id = $request->get('partner_id');
        $partner = Partner::find($partner_id);
        switch ($request->get('status')) {
            case 'block':
                $partner->status = 2;
                break;
            case 'unblock':
                $partner->status = 1;
                break;
        }
        $partner->save();
        return response()->json(['status' => 'ok']);
    }

    public function getSummary(Request $request)
    {
        $partners = $request->get('partners');

        $invitations = InvitationCounter::whereHas('invitation', function ($q) use ($partners) {
            $q->whereIn('partner_id', $partners);
        })->get();

        $data['views'] = 0;
        $data['clicks'] = 0;
        $data['regs'] = 0;
        foreach ($invitations as $invitation) {
            $data['views'] += $invitation->count;
            $data['clicks']++;
            if ($invitation->status == InvitationCounter::STATUS_REGISTERED) {
                $data['regs']++;
            }
        }
        $data['hits'] = $data['views'];

        return response()->json($data);
    }

    public function getPartners(Request $request)
    {
        $blocked = $request->get('blocked');
        $await = $request->get('await');
        $approved = $request->get('approved');
        $query = Partner::where('apa_id', auth()->user()->id)->with('user')->with('user.country')->moderatedMessagesCount();

        $query->where(function ($q) use ($blocked, $approved, $await) {
            if ($blocked) {
                $q->orWhere('status', Partner::STATUS_BLOCKED);
            }
            if ($await) {
                $q->orWhere('status', Partner::STATUS_AWAIT);
            }
            if ($approved) {
                $q->orWhere('status', Partner::STATUS_APPROUVED);
            }
        });

        $partners = $query->get();
        return response()->json($partners);
    }

    public function getPartner(Partner $partner)
    {
        $data['user'] = $partner->user;
        $data['partner'] = $partner;
        return response()->json($data);
    }
    public function updatePartner(Partner $partner)
    {
        $data['user'] = $partner->user;
        $data['partner'] = $partner;
        return response()->json($data);
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
        $dates = $invitations->get();
        if ($req['dateType'] == 'week') {
            $labels = $dates->groupBy(function ($invitation) {
                return $invitation->created_at->startOfWeek()->format('d.m.Y') . '-' . $invitation->created_at->endOfWeek()->format('d.m.Y');
            });

        } else {
            $labels = $dates->groupBy(function ($invitation) {
                return $invitation->created_at->format('d-m-Y');
            });
        }

        $data['result'] = $labels->transform(function ($invitation, $key) {
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
