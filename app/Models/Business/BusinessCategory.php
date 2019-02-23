<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BusinessCategory extends Model
{
    use HasTranslations;

    protected $table = 'business_categories';
    public $timestamps = true;
    protected $fillable = array('parent_id','name', 'translation','icon');
    public $translatable = ['translation'];

    public function businesses()
    {
        return $this->hasMany('App\Models\Business\Business');
    }
}
