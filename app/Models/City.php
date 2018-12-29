<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model 
{
    use HasTranslations;

    public $translatable = ['translations'];

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'translations', 'country_id');

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

}
