<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class CampaignTarget extends Model
{
    protected $table = 'campaign_targets';
    public $timestamps = true;
    protected $fillable = array('name','country_id','campaign_id','cpl','cps');

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function campaign(){
        return $this->belongsTo('App\Models\Referral\Campaign');
    }

}
