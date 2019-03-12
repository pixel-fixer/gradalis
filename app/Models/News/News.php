<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class News extends Model implements HasMedia
{
    use HasTranslations, HasMediaTrait;

    //В ожидании
    public const STATUS_AWAIT = 0;
    //Прошел модерацию
    public const STATUS_MODERATED = 1;
    //Одобрен
    public const STATUS_APPROVED = 2;
    //Отклонен
    public const STATUS_DECLINED = 4;
    public $timestamps = true;
    public $translatable = [
        'title',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'vk',
        'ok',
        'fb',
        'google',
        'mail',
        'url',
        'video'
    ];
    protected $table = 'news';
    protected $fillable = array(
        'title',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'category_id',
        'vk',
        'ok',
        'fb',
        'google',
        'mail',
        'status',
        'url',
        'video'
    );
    protected $appends = [
        'images',
    ];

    public function getImagesAttribute()
    {
        $images = [];
        foreach ($this->getMedia() as $media){

            $images[] = $media->getUrl();
        }
        return $images;
    }
    public function category()
    {
        return $this->belongsTo('App\Models\News\NewsCategory');
    }

    public function newsMedia()
    {
        return $this->media()->where('collection_name', 'news');
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_MODERATED => 'Прошел модерацию',
            self::STATUS_APPROVED => 'Одобрен',
            self::STATUS_DECLINED  => 'Отклонен',
        ];
    }
}
