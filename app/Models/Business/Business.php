<?php

namespace App\Models\Business;

use App\Models\Buyer;
use App\Models\Referral\Campaign;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Translatable\HasTranslations;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use App\Models\ObjectRequest;
/**
 * Class Business
 *
 * @property int $id
 * @property int $user_id
 * @property array $name
 * @property array $description
 * @property array $seo_title
 * @property array $seo_description
 * @property array $seo_keywords
 * @property int $price
 * @property int $profitability
 * @property int $profit
 * @property int $payback
 * @property int $status
 * @property int $district_id
 * @property int $city_id
 * @property int $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $commission
 * @property int $call_count
 * @property float $percent
 * @property string $metrics
 * @property int $login_count
 * @property array $url
 * @property int $revenue
 * @property int $weight
 * @property int $discount
 * @property int $part
 * @property int $part_amount
 * @property array $options
 * @property int $show_count
 *
 * @property \App\Models\Business\BusinessCategory $business_category
 * @property \App\Models\City $city
 * @property \App\Models\District $district
 * @property \App\Models\Auth\User $user
 */

class Business extends Model implements HasMedia
{
    use HasTranslations, Favoriteable, HasMediaTrait;

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
    //Отклонен
    const STATUS_RESERVED = 5;

    //Весь Бизнес
    const PART_ALL = 1;
    //Доля Бизнеса
    const PART_QUOTA = 2;
    //Акции
    const PART_STOCK = 3;

    protected $table        = 'businesses';
    public    $timestamps   = true;
    public    $translatable = ['url', 'name', 'description', 'seo_title', 'seo_description', 'seo_keywords'];
    protected $appends = ['type'];
    protected $fillable     = array(
        'part',
        'url',
        'discount',
        'revenue',
        'weight',
        'price',
        'show_count',
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
        'category_id',
        'options'
    );

    public function getTypeAttribute()
    {
        return "business";
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('business')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);

                $this->addMediaConversion('card')
                    ->width(214)
                    ->height(250);

                $this->addMediaConversion('original')
                    ->width(1024)
                    ->height(768);
            });
    }

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

    public function buyer()
    {
        return $this->morphMany(Buyer::class, 'target','target_type','target_id','id');
    }

    public function getCountryIdAttribute()
    {
        return $this->city->country_id;
    }

    public function getEuroAttribute()
    {
        return $this->price * config('currency.PLN_EUR');
    }

    public function getBitcoinAttribute()
    {
        return $this->price * config('currency.PLN_BTC');
    }

//    public function getDescriptionAttribute($value): string
//    {
//        $data = json_decode($value, true);
//        if(!$data){
//            return $value;
//        }
//        return json_decode($value, true)[app()->getLocale()];
//    }
//
//
//    public function getNameAttribute($value): string
//    {
//        $data = json_decode($value, true);
//        if(!$data){
//            return $value;
//        }
//        return json_decode($value, true)[app()->getLocale()];
//    }

    protected $casts = [
        'options' => 'array',
    ];

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_MODERATED => 'Прошел модерацию',
            self::STATUS_APPROUVED => 'Одобрен',
            self::STATUS_SOLD_OUT  => 'Продан',
            self::STATUS_DECLINED  => 'Отклонен',
            self::STATUS_RESERVED  => 'Зарезервирован',
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

    public function view_request()
    {
        return $this->morphMany('App\Models\ObjectRequest', 'object')->where('type', ObjectRequest::TYPE_VIEW);
    }

    public function doc_request()
    {
        return $this->morphMany('App\Models\ObjectRequest', 'object')->where('type', ObjectRequest::TYPE_DOC);
    }

    public function request()
    {
        return $this->morphMany('App\Models\ObjectRequest', 'object');
    }
}
