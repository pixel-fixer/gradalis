<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Franchise extends Model
{
    use HasTranslations;

    //В ожидании
    const STATUS_AWAIT      = 0;
    //Прошел модерацию
    const STATUS_MODERATED  = 1;
    //Одобрен
    const STATUS_APPROUVED  = 2;
    //Продан
    const STATUS_SOLD_OUT  = 3;
    //Отклонен
    const STATUS_DECLINED    = 4;

    public $timestamps = true;
    protected $table = 'franchises';
    public $translatable = ['name', 'description', 'seo_title','seo_description','seo_keywords','education'];
    protected $fillable = array(
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
        'category_id'
    );

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

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT  => 'В ожидании',
            self::STATUS_MODERATED  => 'Прошел модерацию',
            self::STATUS_APPROUVED => 'Одобрен',
            self::STATUS_SOLD_OUT => 'Продан',
            self::STATUS_DECLINED => 'Отклонен',
        ];
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
}