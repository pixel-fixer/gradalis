<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class District extends Model
{
    use HasTranslations;

    public $translatable = ['translation'];

    protected $table = 'districts';
    public $timestamps = true;
    protected $fillable = array('name', 'translation', 'country_id');

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

}
