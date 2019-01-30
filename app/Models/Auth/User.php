<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'full_name'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function business()
    {
        return $this->hasMany('App\Models\Business\Business');
    }

    public function franchise()
    {
        return $this->hasMany('App\Models\Franchise\Franchise');
    }

    public function city()
    {
        return $this->BelongsTo('App\Models\City');
    }

    public function broker()
    {
        return $this->belongsTo('App\Models\Auth\User', 'broker_id', 'id');
    }

    //TODO Возможно, сделать 2 отдельных метода для покупателей и продавцов?
    public function users()
    {
        $this->hasMany('App\Models\Auth\User', 'id', 'broker_id');
    }

    public function canModerateMessages()
    {
        return $this->hasAnyRole(['Админ', 'Главный брокер']) ? true : false;
    }

    public function dialog()
    {
       return $this->belongsTo('App\Chat\Dialog');
    }

}
