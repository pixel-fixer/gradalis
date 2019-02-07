<?php

use Faker\Generator as Faker;
use App\Models\Language;

$factory->define(\App\Models\Service\Service::class, function (Faker $faker) {

    return [
        'category_id' => rand(1,3),
        'type' => 1,
        'status' => 1,
        'name' => ['en' => 'Service', 'pl' => 'Usługa','ru' => 'Услуга'],
        'price_pln' => 2300,
        'price_eur' => 10000,
        'price_for' => ['en' => 'за единицу услуги', 'pl' => 'за единицу услуги','ru' => 'за единицу услуги'],
        'small_text' => $faker->text(),
        'icon' => '/svg/icons/services/ic_translate.svg',
        'slug' => 'link-to-service'
    ];
});
