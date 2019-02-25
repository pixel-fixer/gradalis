<?php

namespace App\Observers;

use App\Events\NewChartData;
use App\Models\Referral\InvitationCounter;

class InvitationObserver
{

    public function created(InvitationCounter $counter)
    {

        event(new NewChartData($counter->invitation->partner, $counter));

    }


    public function updated(InvitationCounter $counter)
    {

        event(new NewChartData($counter->invitation->partner, $counter));

    }
}
