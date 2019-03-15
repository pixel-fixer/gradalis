<?php

namespace App\Models\Review;

use Reliese\Database\Eloquent\Model as Eloquent;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Review
 *
 * @property int            $id
 * @property int            $status
 * @property string         $phone
 * @property string         $email
 * @property array          $company
 * @property array          $name
 * @property array          $article
 * @property array          $video_url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Review extends Eloquent implements HasMedia
{
    
    use HasTranslations, HasMediaTrait;
    
    public const STATUS_AWAIT = 0;
    
    public const STATUS_MODERATED = 1;
    
    public const STATUS_APPROVED = 4;
    
    public const STATUS_DECLINED = 5;
    
    public $translatable = [
        'company',
        'name',
        'article',
        'video_url',
    ];
    
    protected $casts = [
        'company'   => 'json',
        'name'      => 'json',
        'article'   => 'json',
        'video_url' => 'json',
    ];
    
    protected $fillable = [
        'phone',
        'email',
        'company',
        'name',
        'article',
        'video_url',
    ];
    
    public function reviewMedia()
    {
        return $this->media()->where('collection_name', 'review');
    }
    
    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_MODERATED => 'Прошел модерацию',
            self::STATUS_APPROVED  => 'Одобрен',
            self::STATUS_DECLINED  => 'Отклонен',
        ];
    }
}
