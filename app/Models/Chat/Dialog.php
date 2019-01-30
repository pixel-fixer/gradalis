<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    protected $fillable = ['type', 'related_to', 'user_id', 'theme'];

    private $types = ['support', 'buyer', 'seller'];

    protected $morphToTypes = [
        'App\Models\Business\Business' => 'business',
        'App\Models\Business\Franchise' => 'franchise'
    ];

    protected $appends = ['object_type_code'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function object()
    {
        return $this->morphTo();
    }

    public function getObjectTypeCodeAttribute() {
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
            $this->attributes['type'] = array_search($value, $this->types) + 1;
        else
            throw new \Exception('Wrong Dialog model type');
    }

    public function users()
    {
        return $this->belongsTo('App\Auth\User');
    }

}
