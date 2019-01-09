<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function travel()
    {
        return $this->belongsTo('App\Models\Travels\Travel');
    }

    protected $casts = [
        'in_time' => 'datetime',
        'out_time' => 'datetime'
    ];
}
