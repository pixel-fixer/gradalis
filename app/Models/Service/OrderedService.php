<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class OrderedService extends Model
{
    public function service()
    {
        return $this->belongsTo('App\Models\Services\Service');
    }
}
