<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class OrderedService extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service\Service');
    }
}
