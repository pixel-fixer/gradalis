<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Franchise extends Model
{
    use HasTranslations;
    public $timestamps = true;
    protected $table = 'franchises';
    public $translatable = ['name', 'description', 'seo_title','seo_description','seo_keywords','education'];
    protected $fillable = array(
        'name',
        'description',
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

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Franchise\FranchisePackage');
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
