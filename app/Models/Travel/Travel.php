<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Models\ObjectRequest;


class Travel extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = ['id', 'ordered_services_id'];

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

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('documents')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf'
                    || $file->mimeType === 'application/msword'
                    || $file->mimeType === 'image/jpeg'
                    || $file->mimeType === 'image/png';
            });
    }

    public function object_view()
    {
        return $this->hasMany('App\Models\ObjectRequest')->where('type', ObjectRequest::TYPE_VIEW);
    }
}
