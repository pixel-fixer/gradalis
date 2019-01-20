<?php

use App\Models\Franchise\Franchise;
use App\Models\Franchise\FranchiseCategory;
use App\Models\Franchise\FranchisePackage;
use App\Models\Language;
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
        ini_set('memory_limit', '2G');
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

        factory(Franchise::class, 3)->make()->each(function ($franchise) {
            foreach (Language::all() as $lang) {
                $faker = Faker::create($lang->lang . '_' . strtoupper($lang->lang));
                $name = 'Франшиза - '.$faker->company;
                $description = $faker->realText(160);
                $franchise->setTranslation('name',$lang->lang,$name);
                $franchise->setTranslation('description',$lang->lang,$description);
                $franchise->setTranslation('seo_title',$lang->lang,$name);
                $franchise->setTranslation('seo_description',$lang->lang,$description);
                $franchise->setTranslation('seo_keywords',$lang->lang,$faker->words(4, true));
                $franchise->save();
            }
        });

        Schema::enableForeignKeyConstraints();
    }
}
