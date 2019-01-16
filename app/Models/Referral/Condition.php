<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Condition extends Model
{
    use HasTranslations;

    public $translatable = ['name','description'];

    protected $table = 'conditions';
    public $timestamps = true;
    protected $fillable = array('name', 'description');

    public function campaigns(){
        return $this->belongsToMany('App\Models\Referral\Campaign');
    }

}
