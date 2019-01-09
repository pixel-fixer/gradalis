<?php

use Faker\Generator as Faker;
use App\Models\Language;

$factory->define(\App\Models\Service\Service::class, function (Faker $faker) {

    return [
        'type' => 1,
        'status' => 1,
        'name' => ['en' => 'Service', 'pl' => 'Usługa','ru' => 'Услуга'],
        'price' => 10000
    ];
});
