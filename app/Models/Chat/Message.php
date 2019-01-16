<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from', 'to', 'text', 'status', 'dialog_id'];

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
