<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Message extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    protected $fillable = ['from', 'to', 'text', 'status', 'dialog_id'];

    protected $dates = ['deleted_at'];

    //TODO Дописать
    /*
    protected $statuses = [

    ];
    */

    protected $attributes = [
        'status' => 0,
    ];

    public function dialog()
    {
        return $this->belongsTo(Dialog::class);
    }

    public function from()
    {
        return $this->belongsTo('App\Models\Auth\User','from','id');
    }

    public function to()
    {
        return $this->belongsTo('App\Models\Auth\User','to','id');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    //TODO протестить
    public function registerMediaCollections()
    {
        $this->addMediaCollection('attachment')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png' || $file->mimeType === 'application/pdf';
            });
    }
}
