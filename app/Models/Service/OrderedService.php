<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class OrderedService extends Model implements HasMedia
{
    use HasMediaTrait;

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service\Service');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('ur_documents');

        $this->addMediaCollection('buh_documents');
    }
}
