<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
//        $translations = [
//            'ru' => 'Россия',
//            'en' => 'Russia',
//            'pl' => 'Rosja'
//        ];
//        $country = new Country();
//        $country->name = 'russia';
//        $country->setTranslations('translation', $translations);
//        $country->save();

        $translations = [
            'ru' => 'Польша',
            'en' => 'Poland',
            'pl' => 'Polska'
        ];
        $country = new Country();
        $country->name = 'poland';
        $country->setTranslations('translation', $translations);
        $country->save();
        Schema::enableForeignKeyConstraints();
    }
}
