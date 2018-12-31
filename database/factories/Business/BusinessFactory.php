<?php

use App\Models\Business\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'price' => 10000,
        'profitability'=>1,
        'user_id' => rand(1,3),
        'profit' => 100,
        'payback' => 100,
        'status'=>1,
        'district_id' => 1,
        'city_id' => 1,
        'category_id' => rand(1,2)
    ];
});
