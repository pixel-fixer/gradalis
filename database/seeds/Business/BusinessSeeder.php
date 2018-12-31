<?php

use App\Models\Business\Business;
use App\Models\Business\BusinessCategory;
use App\Models\Business\BusinessTranslation;
use App\Models\Language;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Class BusinessSeeder
 */
class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '1024M');
        Schema::disableForeignKeyConstraints();
        $businessCategory = new BusinessCategory();
        $translations = [
            'ru' => 'Недвижимость',
            'en' => 'Realty',
            'pl' => 'Nieruchomości',
        ];
        $businessCategory->name = "Недвижимость";
        $businessCategory->setTranslations('translation', $translations);
        $businessCategory->save();

        $businessCategory = new BusinessCategory();
        $translations = [
            'ru' => 'Фармацевтика',
            'en' => 'Pharmaceuticals',
            'pl' => 'Farmaceutyki',
        ];
        $businessCategory->name = "Фармацевтика";
        $businessCategory->setTranslations('translation', $translations);
        $businessCategory->save();

        factory(Business::class, 20)->make()->each(function ($business) {
            foreach (Language::all() as $lang) {
                $faker = Faker::create($lang->lang . '_' . strtoupper($lang->lang));
                $name = $faker->company;
                $description = $faker->realText(160);
                $business->setTranslation('name',$lang->lang,$name);
                $business->setTranslation('description',$lang->lang,$description);
                $business->setTranslation('seo_title',$lang->lang,$name);
                $business->setTranslation('seo_description',$lang->lang,$description);
                $business->setTranslation('seo_keywords',$lang->lang,$faker->words(4, true));
                $business->save();
            }
        });


        Schema::enableForeignKeyConstraints();
    }
}
