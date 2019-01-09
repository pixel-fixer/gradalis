<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public function travel()
    {
        return $this->belongsTo('App\Models\Travels\Travel');
    }
}
