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
        ini_set('memory_limit', '2G');
        Schema::disableForeignKeyConstraints();

        foreach (Franchise::all() as $franchise) {
            factory(FranchisePackage::class, 3)->make(['franchise_id' => $franchise->id])->each(function ($package) {
                foreach (Language::all() as $lang) {
                    $faker = Faker::create($lang->lang . '_' . strtoupper($lang->lang));
                    $options = json_encode($faker->words(6));
                    $name = $faker->sentence(3);
                    $package->setTranslation('name', $lang->lang, $name);
                    $package->setTranslation('options', $lang->lang, $options);
                    $package->save();
                }
            });
        }
        Schema::enableForeignKeyConstraints();
    }
}
