<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'price_for', 'small_text'];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Service\ServiceCategory');
    }
}
