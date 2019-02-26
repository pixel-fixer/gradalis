<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class InvitationCounter extends Model
{
    const STATUS_INVITED = 0;
    const STATUS_REGISTERED = 1;
    const STATUS_BUYER = 2;

    public $timestamps = true;
    protected $table = 'invitation_counter';
    protected $fillable = array('invitation_id', 'ip', 'http_referrer', 'user_id', 'token', 'count', 'approved');
    protected $appends = [
        'open_leads',
        'approved_leads',
        'open_targets',
        'payed_targets',
        'open_commission',
        'approved_commission',
    ];

    public function invitation()
    {
        return $this->belongsTo('App\Models\Referral\Invitation');
    }

    public function getOpenLeadsAttribute()
    {
        return $this->targets()->wherePivot('status', 0)
            ->wherePivot('type', 0)
            ->count();
    }

    public function targets()
    {
        return $this->belongsToMany(
            'App\Models\Referral\CampaignTarget',
            'counter_target',
            'counter_id',
            'target_id'
        )->withPivot('sum', 'status', 'type');
    }

    public function getApprovedLeadsAttribute()
    {
        return $this->targets()->wherePivot('status', '>', 0)
            ->wherePivot('type', 0)
            ->count();
    }

    public function getOpenTargetsAttribute()
    {
        return $this->targets()->wherePivot('status', 0)
            ->wherePivot('type', 1)
            ->count();
    }

    public function getOpenCommissionAttribute()
    {
        return $this->targets()->wherePivot('status', 0)
            ->sum('sum');
    }

    public function getApprovedCommissionAttribute()
    {
        return $this->targets()->wherePivot('status', 1)
            ->sum('sum');
    }

    public function getPayedTargetsAttribute()
    {
        return $this->targets()->wherePivot('status', '>', 1)
            ->wherePivot('type', 1)
            ->count();
    }
}
