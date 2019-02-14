<?php

use App\Models\Business\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {

    return [
        'price'         => rand(1000, 1000000),
        'percent'       => 10,
        'profitability' => 1,
        'user_id'       => rand(1, 3),
        'profit'        => 100,
        'payback'       => 100,
        'status'        => rand(0, 4),
        'district_id'   => 1,
        'city_id'       => 1,
        'commission'    => 15,
        'revenue'       => 1000,
        'discount'       => rand(0,15),
        'weight' => array_rand(array(1,2,3,4,null)),
        'category_id'   => rand(1, 2)
    ];
});
