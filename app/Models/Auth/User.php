<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Spatie\Image\Manipulations;

/**
 * @property mixed active
 */
class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use Notifiable, HasRoles, HasMediaTrait, Favoriteability, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'phone', 'city_id', 'subscribes','country_id'
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
        'full_name',
        'avatar'
    ];

    protected $casts = [
        'subscribes' => 'array'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAvatarAttribute()
    {
        $media = $this->getMedia('avatar');
        return isset($media[0]) ? $media[0]->getUrl('avatar') : '';
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

    public function country()
    {
        return $this->BelongsTo('App\Models\Country');
    }

    /**
     * Это может быть или менеджер, или брокер, в зависимости от роли пользователя
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }

    public function users()
    {
        $this->hasMany('App\Models\Auth\User', 'id', 'user_id');
    }

    public function canModerateMessages()
    {
        return $this->hasAnyRole(['Админ', 'Главный брокер']) ? true : false;
    }

    public function dialog()
    {
       return $this->belongsTo('App\Chat\Dialog');
    }
    
    public function isActive() {
        return $this->active;
    }

    public function registerMediaConversions(Media $media = null)
    {
        try {
            $this->addMediaConversion('avatar')
                ->crop(Manipulations::CROP_CENTER, 160, 160);
        } catch ( InvalidManipulation $e ) {
            \Log::error('Avatar conversion failed.');
        }
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')->singleFile();       
    }
}
