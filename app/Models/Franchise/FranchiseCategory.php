<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class FranchiseCategory extends Model
{
    use HasTranslations;
    protected $table = 'franchise_categories';
    public $timestamps = true;
    public $translatable = ['translation'];

    protected $fillable = array(
        'name',
        'translation',
        'parent_id'
    );

}
