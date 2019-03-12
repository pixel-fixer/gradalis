<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class NewsCategory extends Model implements HasMedia
{
    use HasTranslations, HasMediaTrait;

    public $timestamps = true;
    public $translatable = [
        'title',
    ];
    protected $table = 'news_category';
    protected $fillable = array(
        'title','icon'
    );
    public function news()
    {
        return $this->hasMany('App\Models\News\News');
    }

}
