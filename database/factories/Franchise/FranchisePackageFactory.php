<?php

use App\Models\Franchise\FranchisePackage;
use Faker\Generator as Faker;

$factory->define(FranchisePackage::class, function (Faker $faker) {
    return [
        'price' => 10000,
        'profitability'=>1,
        'profit' => 100,
        'lump' => 100,
        'investments' => 1998,
        'roality' => 2000,
        'marketing_fee' => 5,
        'payback' => 100,
    ];
});
