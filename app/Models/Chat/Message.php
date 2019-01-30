<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['from', 'to', 'text', 'status', 'dialog_id'];

    protected $dates = ['deleted_at'];

    //TODO Дописать
    /*
    protected $statuses = [

    ];
    */

    protected $attributes = [
        'status' => 0,
    ];

    public function dialog()
    {
        return $this->belongsTo(Dialog::class);
    }

    public function from()
    {
        return $this->belongsTo('App\Models\Auth\User','from','id');
    }

    public function to()
    {
        return $this->belongsTo('App\Models\Auth\User','to','id');
    }
}
