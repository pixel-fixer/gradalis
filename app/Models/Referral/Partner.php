<?php

namespace App\Models\Referral;

use DB;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //В ожидании
    const STATUS_AWAIT = 0;
    //Одобрен
    const STATUS_APPROUVED = 1;
    //Заблокирован
    const STATUS_BLOCKED = 2;
    public $timestamps = true;
    protected $table = 'partners';
    protected $fillable = array('user_id', 'balance', 'status', 'apa_id', 'hold', 'skype', 'telegram', 'open_commission');

    public static function getStatuses()
    {
        return [
            self::STATUS_AWAIT     => 'В ожидании',
            self::STATUS_BLOCKED   => 'Заблокирован',
            self::STATUS_APPROUVED => 'Одобрен',
        ];
    }

    public static function getStatus($status)
    {
        switch ($status) {
            case self::STATUS_AWAIT:
                return 'В ожидании';
                break;
            case self::STATUS_BLOCKED:
                return 'Заблокирован';
                break;
            case self::STATUS_APPROUVED:
                return 'Одобрен';
                break;
        }
    }

    public static function partnerSummary($partner_id)
    {
        return DB::table('counter_target')
            ->select([
                DB::raw('sum(invitation_counter.count) as views'),
                DB::raw('count(invitation_counter.id) as hits'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_AWAIT.', 1, 0)) as open_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_APPROVED.', 1, 0)) as approved_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPA.' and counter_target.status = '.CounterTarget::STATUS_PAYED.', 1, 0)) as payed_targets'),
                DB::raw('sum(if(counter_target.status = 0, counter_target.sum, 0)) as open_commission'),
                DB::raw('sum(if(counter_target.status = 1, counter_target.sum, 0)) as approved_commission'),
            ])
            ->join('invitation_counter', 'counter_target.counter_id', '=', 'invitation_counter.id')
            ->join('invitations', 'invitation_counter.invitation_id', '=', 'invitations.id')
            ->where('invitations.partner_id', $partner_id);
    }

    public static function partnersSummary($partners_ids)
    {
        return DB::table('counter_target')
            ->select([
                DB::raw('sum(invitation_counter.count) as views'),
                DB::raw('count(invitation_counter.id) as hits'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_AWAIT.', 1, 0)) as open_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_APPROVED.', 1, 0)) as approved_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPA.' and counter_target.status = '.CounterTarget::STATUS_PAYED.', 1, 0)) as payed_targets'),
                DB::raw('sum(if(counter_target.status = 0, counter_target.sum, 0)) as open_commission'),
                DB::raw('sum(if(counter_target.status = 1, counter_target.sum, 0)) as approved_commission'),
            ])
            ->join('invitation_counter', 'counter_target.counter_id', '=', 'invitation_counter.id')
            ->join('invitations', 'invitation_counter.invitation_id', '=', 'invitations.id')
            ->whereIn('invitations.partner_id', $partners_ids);
    }

    public static function partnerOffersSummary($partners_id)
    {
        return DB::table('counter_target')
            ->select([
                'campaigns.id',
                DB::raw("JSON_EXTRACT(campaigns.name,'$.ru') AS name"),
                DB::raw('sum(invitation_counter.count) as views'),
                DB::raw('count(invitation_counter.id) as hits'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_AWAIT.', 1, 0)) as open_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_APPROVED.', 1, 0)) as approved_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPA.' and counter_target.status = '.CounterTarget::STATUS_PAYED.', 1, 0)) as payed_targets'),
                DB::raw('sum(if(counter_target.status = 0, counter_target.sum, 0)) as open_commission'),
                DB::raw('sum(if(counter_target.status = 1, counter_target.sum, 0)) as approved_commission'),
            ])
            ->join('invitation_counter', 'counter_target.counter_id', '=', 'invitation_counter.id')
            ->join('invitations', 'invitation_counter.invitation_id', '=', 'invitations.id')
            ->join('campaigns', 'invitations.campaign_id', '=', 'campaigns.id')
            ->where('invitations.partner_id', $partners_id)
            ->groupBy('invitations.campaign_id');
    }

    public static function partnerLeadsSummary(int $partners_id, string $dateType = 'day', $from = null, $to = null, int $campaign_id = null)
    {
        $dateString = '';
        if ($dateType === 'day') {
            $dateString = "DATE_FORMAT(counter_target.updated_at, '%d.%m.%Y') as date";
        } elseif ($dateType === 'week') {
            $dateString = "CONCAT( year(counter_target.updated_at) , '-',DATE_FORMAT(counter_target.updated_at,'%v')) AS date";
        }
        $data = DB::table('counter_target')
            ->select([
                'campaigns.id',
                DB::raw($dateString),
                DB::raw("JSON_EXTRACT(campaigns.name,'$.ru') AS name"),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_AWAIT.', 1, 0)) as open_leads'),
                DB::raw('sum(if(counter_target.type = '.CounterTarget::TYPE_CPL.' and counter_target.status = '.CounterTarget::STATUS_APPROVED.', 1, 0)) as approved_leads'),
            ])
            ->join('invitation_counter', 'counter_target.counter_id', '=', 'invitation_counter.id')
            ->join('invitations', 'invitation_counter.invitation_id', '=', 'invitations.id')
            ->join('campaigns', 'invitations.campaign_id', '=', 'campaigns.id')
            ->where('invitations.partner_id', $partners_id)
            ->where('counter_target.type', 0);
        if ($campaign_id !== null) {
            $data->where('invitations.campaign_id', $campaign_id);
        }
        if ($from !== null) {
            $data->where('counter_target.updated_at', '>=', $from->format('Y-m-d'));
        }
        if ($to !== null) {
            $data->where('counter_target.updated_at', '<=', $to->format('Y-m-d'));
        }
        if ($dateType === 'day') {
            $data->groupBy(DB::raw("DAY(counter_target.updated_at)"));
        } elseif ($dateType === 'week') {
            $data->groupBy(DB::raw("WEEK(counter_target.updated_at)"));
        }
        $data->orderBy('counter_target.updated_at');
        return $data;
    }

    public static function partnerLeadsDetails(int $partners_id, $from = null, $to = null, int $campaign_id = null)
    {
        $dateString = '';
        $data = DB::table('counter_target')
            ->select([
                'campaigns.id',
                'users.login_count',
                DB::raw("JSON_EXTRACT(campaigns.name,'$.ru') AS name"),
                DB::raw("counter_target.id AS lead_id"),
                DB::raw("DATE_FORMAT(counter_target.created_at,'%d.%m.%Y') as date"),
                DB::raw("DATE_FORMAT(counter_target.created_at,'%H:%i') as time"),
            ])
            ->join('invitation_counter', 'counter_target.counter_id', '=', 'invitation_counter.id')
            ->join('users', 'invitation_counter.user_id', '=', 'users.id')
            ->join('invitations', 'invitation_counter.invitation_id', '=', 'invitations.id')
            ->join('campaigns', 'invitations.campaign_id', '=', 'campaigns.id')
            ->where('invitations.partner_id', $partners_id)
            ->where('counter_target.type', CounterTarget::TYPE_CPL);
        if ($campaign_id !== null) {
            $data->where('invitations.campaign_id', $campaign_id);
        }
        if ($from !== null) {
            $data->where('counter_target.created_at', '>=', $from->format('Y-m-d'));
        }
        if ($to !== null) {
            $data->where('counter_target.created_at', '<=', $to->format('Y-m-d'));
        }

        $data->orderBy('counter_target.created_at');
        return $data;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function accountManager()
    {
        return $this->belongsTo('App\Models\Auth\User', 'apa_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Chat\Message', 'from', 'user_id');
    }

    public function scopeModeratedMessagesCount($query)
    {
        return $query->withCount(['messages as moderate_messages' => function ($q) {
            $q->where('status', 0);
        }]);
    }

    public function invitations()
    {
        return $this->hasMany('App\Models\Referral\Invitation');
    }

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Referral\Campaign');
    }


}
