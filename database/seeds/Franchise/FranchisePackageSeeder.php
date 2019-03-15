<?php

use App\Models\Franchise\Franchise;
use App\Models\Franchise\FranchisePackage;
use App\Models\Franchise\FranchisePackageTranslation;
use App\Models\Language;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Class FranchisePackageSeeder
 */
class FranchisePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    
        $fakers = [
            'ru' => Faker::create('ru_RU'),
            'en' => Faker::create('en_EN'),
            'pl' => Faker::create('pl_PL')
        ];
        foreach (Franchise::all() as $franchise) {
            factory(FranchisePackage::class, 3)->make(['franchise_id' => $franchise->id])
                                               ->each(function ($package) use ($fakers) {
                foreach (Language::all() as $lang) {
                    $faker = $fakers[$lang->lang];
                    $options = json_encode($faker->words(6));
                    $name = $faker->sentence(3);
                    $package->setTranslation('name', $lang->lang, $name);
                    $package->setTranslation('options', $lang->lang, $options);
                    $package->save();
                    $faker = null;
                }
            });
        }
        Schema::enableForeignKeyConstraints();
    }
}
