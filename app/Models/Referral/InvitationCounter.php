<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class InvitationCounter extends Model
{
    const STATUS_INVITED = 0;
    const STATUS_REGISTERED = 1;
    const STATUS_BUYER = 2;

    protected $table = 'invitation_counter';
    public $timestamps = true;
    protected $fillable = array('invitation_id','ip','http_referrer','user_id','token','count');

    public function invitation(){
        return $this->belongsTo('App\Models\Referral\Invitation');
    }
}
