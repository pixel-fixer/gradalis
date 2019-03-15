<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class TravelComment extends Model
{
    protected $guarded = [];

    public function travel()
    {
        return $this->belongsTo('App\Models\Travels\Travel');
    }

}
