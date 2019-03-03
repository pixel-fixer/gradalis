<?php

namespace App\Models\Referral;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CounterTarget extends Pivot
{
    const STATUS_AWAIT = 0;
    const STATUS_APPROVED = 1;
    const STATUS_ADS_HOLD = 2;
    const STATUS_HOLD = 3;
    const STATUS_PAYED = 4;
    const STATUS_BLOCKED = 5;

    const TYPE_CPL = 0;
    const TYPE_CPA = 1;
    const TYPE_CPS = 1;

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT    => 'В ожидании',
            self::STATUS_APPROVED => 'Одобрен',
            self::STATUS_ADS_HOLD => 'Холд рекламодателя',
            self::STATUS_HOLD     => 'Холд компании',
            self::STATUS_PAYED    => 'Оплачен',
            self::STATUS_BLOCKED  => 'Заблокирован',
        ];
    }

    public static function getStatus($status)
    {
        switch ($status) {
            case self::STATUS_AWAIT:
                return 'В ожидании';
                break;
            case self::STATUS_APPROVED:
                return 'Одобрен';
                break;
            case self::STATUS_ADS_HOLD:
                return 'Холд рекламодателя';
                break;
            case self::STATUS_HOLD:
                return 'Холд компании';
                break;
            case self::STATUS_PAYED:
                return 'Оплачен';
                break;
            case self::STATUS_BLOCKED:
                return 'Заблокирован';
                break;
        }
    }

    public static function getTypes()
    {
        return [
            self::TYPE_CPL => 'Cost per lead',
            self::TYPE_CPA => 'Cost per action',
            self::TYPE_CPS => 'Cost per sale',
        ];
    }

    public static function getType($type)
    {
        switch ($type) {
            case self::TYPE_CPL:
                return 'Cost per lead';
                break;
            case self::TYPE_CPA:
                return 'Cost per action';
                break;
            case self::TYPE_CPS:
                return 'Cost per sale';
                break;
        }
    }
}
