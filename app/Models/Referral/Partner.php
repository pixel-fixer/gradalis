<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    public $timestamps = true;
    protected $fillable = array('user_id', 'balance');

    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }

}