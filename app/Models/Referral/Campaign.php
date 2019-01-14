<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasTranslations;

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

}
