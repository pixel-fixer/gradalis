<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use function GuzzleHttp\json_decode;

class Service extends Model
{
    use HasTranslations;


    const STATUS_DRAFT = 0;

    const STATUS_MODERATION = 1;

    const STATUS_DISABLED = 2; 

    const STATUS_ACTIVE = 3;       


    /* Для покупателя или продавца */

    const TYPE_FOR_SELLER = 1;   

    const TYPE_FOR_BUYER = 2;
    
    
    public $translatable = ['name', 'price_for', 'small_text'];

    protected $guarded = ['id'];

    /* json поля для кастомных услуг */
    protected $casts = [
        'promo_video' => 'array',
    ];

    /* Дефолтные значения для json полей */
    public function getPromoVideoAttribute($value){
        if(!$value)
            return ['link' => '', 'description' => ''];
        else
            return json_decode($value);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Service\ServiceCategory');
    }

    // public function getNameAttribute($value): string
    // {
    //     $data = json_decode($value, true);
    //     if(!$data){
    //         return $value;
    //     }
    //     return json_decode($value, true)[app()->getLocale()];
    // }

    public static function getStatusLabels(){
        return [
            self::STATUS_DRAFT => __('fields.status_draft'),
            self::STATUS_MODERATION => __('fields.status_moderation'),
            self::STATUS_DISABLED => __('fields.status_disabled'),
            self::STATUS_ACTIVE => __('fields.status_active'),
        ];
    }

}
