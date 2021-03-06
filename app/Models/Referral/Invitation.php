<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';
    public $timestamps = true;
    protected $fillable = array('partner_id','sub_account', 'campaign_id','campaign_resource_id','token','status');

    public function campaign(){
        return $this->belongsTo('App\Models\Referral\Campaign');
    }
    public function resource(){
        return $this->belongsTo('App\Models\Referral\CampaignResource','campaign_resource_id' ,'id');
    }
    public function counters(){
        return $this->hasMany('App\Models\Referral\InvitationCounter');
    }
    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function partner(){
        return $this->belongsTo('App\Models\Referral\Partner');
    }

    protected $casts = [
        'sub_account' => 'array',
    ];
    /**
     * Генерируем токен для партнера
     *
     * @return string
     */
    public static function makeToken()
    {
        do {
            //Генерируем токен
            $token = strtolower(str_random(16));
        } //если токен существует генерируем заново
        while (Invitation::where('token', $token)->exists());

        return $token;
    }

}
