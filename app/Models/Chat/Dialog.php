<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $fillable = ['type', 'related_to', 'user_id'];

    private $types = ['support', 'customer', 'seller'];

    protected $morphToTypes = [
        'App\Models\Business\Business' => 'business',
        'App\Models\Business\Franchise' => 'franchise'
    ];

    protected $appends = ['object_type_short'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function object()
    {
        return $this->morphTo();
    }

    public function getObjectTypeShortAttribute() {
        $type = $this->object_type;
        if(!$type) {
            return null;
        }
        return array_get($this->morphToTypes, $type, $type);
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Chat\Message');
    }

    public function getTypeAttribute($value)
    {
        return $this->types[$value-1];
    }

    public function setTypeAttribute($value)
    {
        if(is_int($value))
            $this->attributes['type'] = $value;
        elseif(is_string($value) && in_array($value, $this->types))
            $this->attributes['type'] = $this->types[$value];
        else
            throw new \Exception('Wrong Dialog model type');
    }


}
