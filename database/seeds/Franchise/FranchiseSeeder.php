<?php

use App\Models\Franchise\Franchise;
use App\Models\Franchise\FranchiseCategory;
use App\Models\Franchise\FranchisePackage;
use App\Models\Language;
use App\Services\Helpers;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Class FranchiseSeeder
 */
class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $franchiseCategory = new FranchiseCategory();
        $translations = [
            'ru' => 'Недвижимость',
            'en' => 'Realty',
            'pl' => 'Nieruchomości',
        ];
        $franchiseCategory->name = "Недвижимость";
        $franchiseCategory->setTranslations('translation', $translations);
        $franchiseCategory->save();

        $franchiseCategory = new FranchiseCategory();
        $translations = [
            'ru' => 'Фармацевтика',
            'en' => 'Pharmaceuticals',
            'pl' => 'Farmaceutyki',
        ];
        $franchiseCategory->name = "Фармацевтика";
        $franchiseCategory->setTranslations('translation', $translations);
        $franchiseCategory->save();
    
        $fakers = [
            'ru' => Faker::create('ru_RU'),
            'en' => Faker::create('en_EN'),
            'pl' => Faker::create('pl_PL')
        ];
        factory(Franchise::class, 3)->make()->each(function ($franchise) use
        ($fakers) {
            foreach (Language::all() as $lang) {
                $faker = $fakers[$lang->lang];
                $name = 'Франшиза - '.$faker->company;
                $url = Helpers::transliterate($name);
                $description = $faker->realText(160);
                $franchise->setTranslation('name',$lang->lang,$name);
                $franchise->setTranslation('description',$lang->lang,$description);
                $franchise->setTranslation('url',$lang->lang,$url);
                $franchise->setTranslation('seo_title',$lang->lang,$name);
                $franchise->setTranslation('seo_description',$lang->lang,$description);
                $franchise->setTranslation('seo_keywords',$lang->lang,$faker->words(4, true));
                $franchise->save();
                $faker = null;
            }
        });

        Schema::enableForeignKeyConstraints();
    }
}
