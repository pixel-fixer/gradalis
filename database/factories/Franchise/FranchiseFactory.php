<?php

use App\Models\Franchise\Franchise;
use Faker\Generator as Faker;

$factory->define(Franchise::class, function (Faker $faker) {

    return [
        'price'           => rand(1000, 1000000),
        'percent'         => 10,
        'profitability'   => 1,
        'user_id'         => rand(1, 3),
        'profit'          => 100,
        'roality'         => 100,
        'foundation_year' => 1998,
        'start_year'      => 2000,
        'own_enterprices' => 5,
        'status'          => rand(0, 4),
        'commission'      => 15,
        'district_id'     => 1,
        'city_id'         => 1,
        'revenue'            => 1000,
        'discount'       => rand(0,15),
        'weight' => array_rand(array(1,2,3,4,null)),
        'category_id'     => rand(1, 2)
    ];
});
