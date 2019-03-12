<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class CampaignTarget extends Model
{
    public $timestamps = true;
    protected $table = 'campaign_targets';
    protected $fillable = array('name', 'country_id', 'campaign_id', 'cpl', 'cps');

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\Referral\Campaign');
    }

    public function counters()
    {
        return $this->belongsToMany(
            'App\Models\Referral\InvitationCounter',
            'counter_target',
            'target_id',
            'counter_id'
        )->withPivot('sum', 'status', 'type')->withTimestamps();
    }

}
