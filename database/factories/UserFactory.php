<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Auth\User::class, function (Faker $faker) {
    $cities = [1, 2562]; //Москва и Варшава
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'subscribes' => [
            'ordered_service_status' => false,
            'new_message' => false,
            'personal_selection' => false,
            'offer' =>  false 
        ],
        'city_id' => $cities[rand(0,1)],
        'sum_from' => 10000,
        'sum_to' => 1000000
    ];
});
