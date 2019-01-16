<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Referral\InvitationCounter::class, function (Faker $faker, $attrib) {

    if(!isset($attrib['created_at']))
        $created_at = Carbon::now();
    else{
        $created_at = $attrib['created_at'];
    }
    return [
        'invitation_id' => $attrib['invitation_id'],
        'created_at' => $created_at
    ];
});
