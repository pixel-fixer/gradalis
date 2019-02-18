<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasTranslations;

    const TYPE_BUSINESS = 1;
    const TYPE_FRANCHISE = 2;
    const TYPE_SERVICE = 3;

    const STATUS_AWAIT = 0;
    const STATUS_APPROVED = 1;
    const STATUS_DECLINED = 2;

    const CAMPAIGN_STATUS_BASE = 1;

    public $translatable = ['name','description'];

    protected $table = 'campaigns';
    public $timestamps = true;
    protected $fillable = array('name','site','country_id','campaign_status','description','clt_days','approve_days','pay_days', 'target_id','type','status');

    public function referable(){
        return $this->morphTo(null,'type','target_id');
    }

    public function conditions(){
        return $this->belongsToMany('App\Models\Referral\Condition')->withPivot('status');
    }

    public function targets(){
        return $this->hasMany('App\Models\Referral\CampaignTarget');
    }

    public function resources(){
        return $this->hasMany('App\Models\Referral\CampaignResource');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function invitations(){
        return $this->hasMany('App\Models\Referral\Invitation');
    }

    public function bookmarker(){
        return $this->belongsToMany('App\Models\Referral\Partner')->wherePivot('partner_id', auth()->user()->id);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_BUSINESS  => 'Бизнес',
            self::TYPE_FRANCHISE  => 'Франшиза',
            self::TYPE_SERVICE  => 'Услуга',
        ];
    }

    public static function getType($type)
    {
        switch ($type){
            case self::TYPE_BUSINESS: return 'Бизнес';
            case self::TYPE_FRANCHISE: return 'Франшиза';
            case self::TYPE_SERVICE: return 'Услуга';
        }
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_BASE  => 'Базовый'
        ];
    }
    public static function getStatus($status)
    {
        switch ($status){
            case self::CAMPAIGN_STATUS_BASE: return 'Базовый';
        }
    }

}
