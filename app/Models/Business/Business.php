<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Business extends Model 
{
    use HasTranslations;

    protected $table = 'businesses';
    public $timestamps = true;
    protected $fillable = array('price','user_id', 'profitability', 'profit', 'payback', 'status','name', 'description', 'seo_title','seo_description','seo_keywords', 'district_id', 'city_id', 'category_id');
    public $translatable = ['name', 'description', 'seo_title','seo_description','seo_keywords'];
    public function category()
    {
        return $this->belongsTo('App\Models\Business\BusinessCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
