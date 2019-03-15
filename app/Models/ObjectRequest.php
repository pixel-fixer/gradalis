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
class ObjectRequest extends Model
{
    protected $fillable = ['user_id', 'view_at', 'object_id', 'object_type', 'status', 'type', 'travel_id', 'buyer_comment', 'reject_reason'];
    protected $table='object_requests';
    protected $with = ['user.city', 'object'];

    const TYPE_VIEW = 1;
    const TYPE_DOC = 2;

    const STATUS_NEW = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_REJECTED = 3;
    
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function object()
    {
        return $this->morphTo();
    }
}
