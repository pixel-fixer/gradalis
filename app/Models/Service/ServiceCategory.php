<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceCategory extends Model
{
    use HasTranslations;
    
    public $translatable = ['name'];

    protected $fillable = ['icon', 'name', 'category_id'];

    public $statuses = ['paid', 'preparation', 'in_progress', 'done'];

}
