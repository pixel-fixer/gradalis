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
        ini_set('memory_limit', '1G');
        Schema::disableForeignKeyConstraints();
        $faker = Faker::create();
        $options = json_encode($faker->words(6));
        $name = $faker->sentence(3);
        foreach (Franchise::all() as $franchise){
            factory(FranchisePackage::class, 3)->create(['franchise_id' => $franchise->id])->each(function ($package) use ($options,$name) {
                foreach (Language::all() as $lang) {
                    FranchisePackageTranslation::create([
                        'package_id' => $package->id,
                        'lang_id'    => $lang->id,
                        'options'    => $options,
                        'name'       => $name,
                    ]);
                }
            });
        }
        Schema::enableForeignKeyConstraints();
    }
}
