<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CampaignResource extends Model
{
    use HasTranslations;

    public $translatable = ['name','url'];

    protected $table = 'campaign_resources';
    public $timestamps = true;
    protected $fillable = array('name', 'url','type','width','height','campaign_id');

    public function campaign(){
        return $this->belongsTo('App\Models\Referral\Campaign');
    }

}
