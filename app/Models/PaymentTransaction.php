<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class PaymentTransaction extends Model
{
    protected $fillable = ['sum', 'status', 'type_id', 'description'];

    protected $appends = [
        'human_date'
    ];

    public function getHumanDateAttribute()
    {
        //TODO это вся штука работает странно, протестить
        $locale = config('app.locale');
        setlocale(LC_TIME, $locale.'_'.strtoupper($locale).'.UTF-8');
        $date = Carbon::parse($this->created_at);
        return $date->formatLocalized("%d %B %Y");
    }

    public function user()
    {
        return $this->belongsTo('App\Auth\User');
    }
}
