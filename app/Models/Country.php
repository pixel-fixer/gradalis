<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model 
{
    use HasTranslations;

    public $translatable = ['translation'];

    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name','translation');

    public function cities(){
        return $this->hasMany('App\Models\City');
    }

}
