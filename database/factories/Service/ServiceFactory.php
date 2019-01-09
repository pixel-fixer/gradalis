<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Service\Service::class, function (Faker $faker) {
    return [
        'type' => 1,
        'status' => 1,
        'translate' => json_encode(''),
        'price' => 10000
    ];
});
