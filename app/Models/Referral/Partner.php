<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //В ожидании
    const STATUS_AWAIT = 0;
    //Одобрен
    const STATUS_APPROUVED = 1;
    //Заблокирован
    const STATUS_BLOCKED = 2;

    protected $table = 'partners';
    public $timestamps = true;
    protected $fillable = array('user_id', 'balance','status','apa_id','hold');

    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function accountManager(){
        return $this->belongsTo('App\Models\Auth\User','apa_id','id');
    }

    public function messages(){
        return $this->hasMany('App\Models\Chat\Message','from','user_id');
    }

    public function scopeModeratedMessagesCount($query){
        return $query->withCount(['messages as moderate_messages'=> function($q){
            $q->where('status',0);
        }]);
    }

    public function invitations(){
        return $this->hasMany('App\Models\Referral\Invitation');
    }
    public function bookmarks(){
        return $this->belongsToMany('App\Models\Referral\Campaign');
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_APPROUVED => 'Одобрен',
        ];
    }

}
