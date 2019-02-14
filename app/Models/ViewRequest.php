<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer user_id
 * @property DateTime view_at
 * @property integer object_id
 * @property string object_type
 * @property string status
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class ViewRequest extends Model
{
    protected $fillable = ['user_id', 'view_at', 'object_id', 'object_type', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function object()
    {
        return $this->morphTo();
    }
}
