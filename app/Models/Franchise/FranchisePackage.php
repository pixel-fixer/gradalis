<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class FranchisePackage extends Model 
{
    use HasTranslations;
    protected $table = 'franchise_packages';
    public $timestamps = true;
    public $translatable = ['options', 'name'];
    protected $fillable = array(
        'options',
        'name',
        'franchise_id',
        'price',
        'profitability',
        'lump',
        'investments',
        'roality',
        'marketing_fee',
        'start_year',
        'own_enterprices',
        'profit',
        'payback',
    );

    public function franchise()
    {
        return $this->belongsTo('App\Models\Franchise\Franchise');
    }


}
