<?php

use App\Models\Business\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {

    $price = rand(100000, 10000000);
    return [
        'price'         => $price,
        'percent'       => 10,
        'profitability' => rand(30,80),
        'user_id'       => rand(1, 3),
        'profit'        => $price/2,
        'payback'       => rand(12,36),
        'status'        => rand(2, 3),
        'district_id'   => 1,
        'city_id'       => 1,
        'commission'    => 15,
        'revenue'       => $price/4,
        'discount'       => rand(0,15),
        'weight' => array_rand(array(1,2,3,4,null)),
        'category_id'   => rand(1, 4)
    ];
});
