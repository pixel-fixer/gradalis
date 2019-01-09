<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function travel()
    {
        return $this->belongsTo('App\Models\Travels\Travel');
    }

    protected $casts = [
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime'
    ];
}
