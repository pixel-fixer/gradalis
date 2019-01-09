<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];
}
