<?php

namespace App\Models\Business;

use App\Models\Referral\Campaign;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Business extends Model
{
    use HasTranslations;

    //В ожидании
    const STATUS_AWAIT = 0;
    //Прошел модерацию
    const STATUS_MODERATED = 1;
    //Одобрен
    const STATUS_APPROUVED = 2;
    //Продан
    const STATUS_SOLD_OUT = 3;
    //Отклонен
    const STATUS_DECLINED = 4;

    //Весь Бизнес
    const PART_ALL = 1;
    //Доля Бизнеса
    const PART_QUOTA = 2;
    //Акции
    const PART_STOCK = 3;

    protected $table        = 'businesses';
    public    $timestamps   = true;
    public    $translatable = ['url', 'name', 'description', 'seo_title', 'seo_description', 'seo_keywords'];
    protected $fillable     = array(
        'part',
        'url',
        'discount',
        'revenue',
        'weight',
        'price',
        'percent',
        'call_count',
        'metrics',
        'user_id',
        'profitability',
        'profit',
        'payback',
        'status',
        'commission',
        'name',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'district_id',
        'city_id',
        'category_id'
    );

    public function category()
    {
        return $this->belongsTo('App\Models\Business\BusinessCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\Referral\Campaign', 'target_id')->where('type', '=', Campaign::TYPE_BUSINESS);
    }

    protected $casts = [
        'price' => 'array',
    ];

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_MODERATED => 'Прошел модерацию',
            self::STATUS_APPROUVED => 'Одобрен',
            self::STATUS_SOLD_OUT  => 'Продан',
            self::STATUS_DECLINED  => 'Отклонен',
        ];
    }

    public static function getParts()
    {
        return [
            self::PART_ALL   => 'Весь бизнес',
            self::PART_QUOTA => 'Доля бизнеса',
            self::PART_STOCK => 'Акции'
        ];
    }
}
