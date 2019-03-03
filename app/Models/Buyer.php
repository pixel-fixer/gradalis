<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    const STATUS_BOOKED = 0;
    const STATUS_PAYED = 1;

    const TYPE_BUSINESS = 'App\Models\Business\Business';
    const TYPE_FRANCHISE = 'App\Models\Franchise\Franchise';
    const TYPE_SERVICE = 'App\Models\Service\Service';
    public $timestamps = true;
    protected $table = 'buyers';
    protected $fillable = array('status', 'target_type', 'target_id', 'user_id');

    public static function getStatuses()
    {
        return [
            self::STATUS_BOOKED   => 'Забронирован',
            self::STATUS_PAYED    => 'Куплен'
        ];
    }

    public static function getStatus($status)
    {
        switch ($status) {
            case self::STATUS_BOOKED:
                return 'Забронирован';
                break;
            case self::STATUS_PAYED:
                return 'Куплен';
                break;
        }
    }

    public static function getTypes()
    {
        return [
            self::TYPE_BUSINESS  => 'Бизнес',
            self::TYPE_FRANCHISE => 'Франшиза',
            self::TYPE_SERVICE   => 'Услуга',
        ];
    }

    public static function getType($type)
    {
        switch ($type) {
            case self::TYPE_BUSINESS:
                return 'Бизнес';
                break;
            case self::TYPE_FRANCHISE:
                return 'Франшиза';
                break;
            case self::TYPE_SERVICE:
                return 'Услуга';
                break;
        }
    }

    public function target()
    {
        return $this->morphTo(null, 'target_type', 'target_id');
    }
}
