<?php

namespace App\Events;

use App\Models\Referral\Invitation;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChartData implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $partner;
    public $counter;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Partner $partner, InvitationCounter $counter)
    {
        sleep(1);
        $this->partner = $partner;
        $this->counter = $counter;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chart.data.' . $this->partner->id);
    }
}
