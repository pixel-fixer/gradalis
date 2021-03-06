<?php

use App\Models\Business\Business;
use App\Models\Business\BusinessCategory;
use App\Models\Business\BusinessTranslation;
use App\Models\Language;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Services\Helpers;

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
        Schema::disableForeignKeyConstraints();
        $this->saveCategories();
        global $fakers;
        $fakers = [
            'ru' => Faker::create('ru_RU'),
            'en' => Faker::create('en_EN'),
            'pl' => Faker::create('pl_PL')
        ];
        factory(Business::class, 20)->make()->each(function ($business) use
        ($fakers) {
            foreach (Language::all() as $lang) {
                $faker = $fakers[$lang->lang];
                $name = $faker->company;
                $url = Helpers::transliterate($name);
                $description = $faker->realText(160);
                $business->setTranslation('name',$lang->lang,$name);
                $business->setTranslation('description',$lang->lang,$description);
                $business->setTranslation('url',$lang->lang,$url);
                $business->setTranslation('seo_title',$lang->lang,$name);
                $business->setTranslation('seo_description',$lang->lang,$description);
                $business->setTranslation('seo_keywords',$lang->lang,$faker->words(4, true));
                $business->save();
                $faker = null;
            }
        });


        Schema::enableForeignKeyConstraints();
    }

    protected function saveCategories(){
        $categories = [
          ['icon' => 'ic_12.svg', 'name'=> 'Комерч. недвижимость'],
          ['icon' => 'ic_2.svg', 'name'=> 'Аптечный бизнс'],
          ['icon' => 'ic_1.svg', 'name'=> 'Автомойки, сервисы, СТО'],
          ['icon' => 'ic_7.svg', 'name'=> 'Готовый бизнес под ключ']
        ];
        foreach ($categories as $category){
            $businessCategory = new BusinessCategory();
            $businessCategory->name = $category['name'];
            $businessCategory->icon = $category['icon'];
            $businessCategory->setTranslation('translation','ru', $category['name']);
            $businessCategory->save();
        }
    }


}
