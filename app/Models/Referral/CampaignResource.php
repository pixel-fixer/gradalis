<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CampaignResource extends Model
{
    use HasTranslations;

    const TYPE_LANDING = 1;
    const TYPE_BANNER = 2;

    const RESOURCE_TYPE_STANDART = 1;
    const RESOURCE_TYPE_FLASH = 2;
    const RESOURCE_TYPE_IMAGE = 3;


    public $translatable = ['name', 'url'];
    public $timestamps = true;
    protected $table = 'campaign_resources';
    protected $fillable = array('name', 'url', 'type', 'cr', 'resource_type', 'width', 'height', 'campaign_id');

    public static function getTypes()
    {
        return [
            self::TYPE_LANDING => 'Лендинг',
            self::TYPE_BANNER  => 'Баннер'
        ];
    }

    public static function getTypeAttribute($value)
    {
        return self::getType($value);
    }

    public static function getType($type)
    {
        switch ($type) {
            case self::TYPE_LANDING:
                return 'Лендинг';
            case self::TYPE_BANNER:
                return 'Баннер';
        }
    }

    public static function getResourceTypes()
    {
        return [
            self::RESOURCE_TYPE_STANDART => 'Стандартный',
            self::RESOURCE_TYPE_FLASH    => 'Флэш',
            self::RESOURCE_TYPE_IMAGE    => 'Изображение',
        ];
    }

    public static function getResourceTypeAttribute($value)
    {
        return self::getResourceType($value);
    }

    public static function getResourceType($type)
    {
        switch ($type) {
            case self::RESOURCE_TYPE_STANDART:
                return 'Стандартный';
            case self::RESOURCE_TYPE_FLASH:
                return 'Флэш';
            case self::RESOURCE_TYPE_IMAGE:
                return 'Изображение';
        }
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\Referral\Campaign');
    }

}
