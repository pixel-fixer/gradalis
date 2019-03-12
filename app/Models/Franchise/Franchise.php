<?php

namespace App\Models\Franchise;

use App\Models\Referral\Campaign;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use App\Models\ObjectRequest;
class Franchise extends Model
{
    use HasTranslations, Favoriteable;

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

    public    $timestamps   = true;
    public    $translatable = ['url','name', 'description', 'seo_title', 'seo_description', 'seo_keywords', 'education'];
    protected $table        = 'franchises';
    protected $appends = ['type'];
    protected $fillable     = array(
        'name',
        'description',
        'commission',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'education',
        'price',
        'profitability',
        'profit',
        'status',
        'user_id',
        'roality',
        'foundation_year',
        'start_year',
        'own_enterprices',
        'district_id',
        'city_id',
        'category_id',
        'percent',
        'revenue',
        'weight',
        'discount',
        'call_count',
        'metrics',
        'url'
    );

    protected $casts = [
        'price' => 'array',
    ];

    public function getTypeAttribute()
    {
        return "franchise";
    }

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

    public function category()
    {
        return $this->belongsTo('App\Models\Franchise\FranchiseCategory');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Franchise\FranchisePackage');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Models\Referral\Campaign', 'target_id')->where('type', '=', Campaign::TYPE_FRANCHISE);
    }

    /**
     * Получение всех Франшиз
     *
     * @return mixed
     */
    /*public function scopeGetAllFranchises(){ 
        $lang = app()->getLocale();
        $language = Language::where('lang',$lang)->first();
        return $this->leftJoin('franchise_translations', 'franchises.id', '=', 'franchise_translations.franchise_id')->where('franchise_translations.lang_id', $language->id)
            ->select([
                'franchise_translations.name',
                'franchises.id',
                'franchises.price',
                'franchises.profit',
                'franchises.status',
                'franchises.payback',
            ])->get();
    }*/

    public function view_request()
    {
        return $this->morphMany('App\Models\ObjectRequest', 'object')->where('type', ObjectRequest::TYPE_VIEW);
    }

    public function doc_request()
    {
        return $this->morphMany('App\Models\ObjectRequest', 'object')->where('type', ObjectRequest::TYPE_DOC);
    }

    public function getNameAttribute($value): string
    {
        $data = json_decode($value, true);
        if(!$data){
            return $value;
        }
        return json_decode($value, true)[app()->getLocale()];
    }
}
