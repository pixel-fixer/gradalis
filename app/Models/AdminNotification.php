<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = ['text', 'action_link', 'status'];

    protected $statuses = [
        'new',
        'read',
        'done'
    ];

    public function setStatusAttribute($value)
    {
        if(!in_array($value, $this->statuses))
            throw new \Exception('Wrong status for admin notification model');
        $this->attributes['status'] = $value;
    }
}
