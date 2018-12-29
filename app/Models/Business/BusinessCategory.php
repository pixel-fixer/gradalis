<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{

    protected $table = 'business_categories';
    public $timestamps = true;
    protected $fillable = array('name', 'translate');

    public function businesses()
    {
        return $this->hasMany('App\Models\Business\Business');
    }
}
