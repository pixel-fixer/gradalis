<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';
    public $timestamps = true;
    protected $fillable = array('user_id','partner_id', 'campaign_id','campaign_resource_id','token','status','ip','http_referrer');

    public function campaign(){
        return $this->belongsTo('App\Models\Referral\Campaign');
    }

    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function partner(){
        return $this->belongsTo('App\Models\Referral\Partner');
    }

}
