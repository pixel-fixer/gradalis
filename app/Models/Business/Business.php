<?php

namespace App\Models\Business;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;

class Business extends Model 
{

    protected $table = 'businesses';
    public $timestamps = true;
    protected $fillable = array('price','user_id', 'profitability', 'profit', 'payback', 'status','name', 'description', 'seo_title','seo_description','seo_keywords', 'district_id', 'city_id', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Business\BusinessCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
