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

    public $translatable = ['name'];

    protected $table = 'campaigns';
    public $timestamps = true;
    protected $fillable = array('name', 'target_id','type','status');

    public function referralable(){
        return $this->morphTo(null,'type','target_id');
    }

    public function conditions(){
        return $this->belongsToMany('App\Models\Referral\Condition');
    }

    public static function getTypes()
    {
        return [
            self::TYPE_BUSINESS  => 'Бизнес',
            self::TYPE_FRANCHISE  => 'Франшиза',
            self::TYPE_SERVICE  => 'Услуга',
        ];
    }

}
