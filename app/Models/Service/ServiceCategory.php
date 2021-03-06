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

    public function getNameAttribute($value): string
    {
        $data = json_decode($value, true);
        if(!$data){
            return $value;
        }
        return json_decode($value, true)[app()->getLocale()];
    }
}
