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

    ];

    public function invitation()
    {
        return $this->belongsTo('App\Models\Referral\Invitation');
    }


    public function counter_target()
    {
        return $this->hasMany('App\Models\Referral\CounterTarget', 'counter_id');
    }
    public function targets()
    {
        return $this->belongsToMany(
            'App\Models\Referral\CampaignTarget',
            'counter_target',
            'counter_id',
            'target_id'
        )->withPivot('sum', 'status', 'type')->withTimestamps();
    }
}
