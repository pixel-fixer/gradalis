<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $guarded = ['id', 'ordered_services_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function ordered_service()
    {
        return $this->belongsTo('App\Models\Service\OrderedService', 'ordered_services_id', 'id');
    }

    public function hotels()
    {
        return $this->hasMany('App\Models\Travel\Hotel');
    }

    public function meetings()
    {
        return $this->hasMany('App\Models\Travel\Meeting');
    }

    public function flights()
    {
        return $this->hasMany('App\Models\Travel\Flight');
    }

    public function consultations()
    {
        return $this->hasMany('App\Models\Travel\Consultation');
    }

}
