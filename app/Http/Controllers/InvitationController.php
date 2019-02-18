<?php

namespace App\Http\Controllers;

use App\Models\Referral\Invitation;
use App\Models\Referral\InvitationCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class InvitationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function invitation(Request $request, $token)
    {
        $invitation = Invitation::where('token', $token)
            ->with('resource')
            ->with('campaign')
            ->first();
        if(!Cookie::has('invitation_counter')){
            $invitationCounter = InvitationCounter::create([
                'ip'            => $request->getClientIp(),
                'http_referrer' => $request->server('HTTP_REFERER'),
                'invitation_id' => $invitation->id,
                'token'         => $token
            ]);
        }else{
            $invitationCounter = InvitationCounter::find(Cookie::get('invitation_counter'));
            $invitationCounter->count += 1;
            $invitationCounter->save();
        }

        Cookie::queue('invitation_counter', $invitationCounter->id, $invitation->campaign->clt_days, null, '.' . config('app.domain'));
        return redirect($invitation->resource->url);
    }
}
