<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App;
use Session;
class Message extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    const STATUS_MODERATION = 0;
    const STATUS_ACTIVE = 1;

    public function __construct(array $attributes = array())
    {
        $this->attributes['locale'] = App::getLocale();
        $this->attributes['ip_info'] = json_encode(Session::get('ip_info'));
        parent::__construct($attributes);
    }

    protected $fillable = ['from', 'to', 'text', 'status', 'dialog_id', 'locale', 'ip_info'];

    protected $dates = ['deleted_at'];

    protected $appends = ['media_links'];

    protected $attributes = [
        'status' => 0
    ];

    protected $casts = [
        'ip_info' => 'array',
    ];

    public function getMediaLinksAttribute()
    {
        $mediaMapped = $this->media;
        foreach ($this->media as $k => $media){
            $mediaMapped[$k]->url = [
                'origin' => $media->getUrl(),
                'thumb' =>$media->getUrl('thumb')
            ];
        }

        return $mediaMapped;
    }

    public function getTextAttribute($text){
        if(!$text)
            return '';
        else
            return $text;
    }

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
