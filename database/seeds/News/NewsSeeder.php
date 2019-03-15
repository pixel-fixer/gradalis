<?php


use App\Models\Language;
use App\Models\News\News;
use App\Models\News\NewsCategory;
use App\Services\Helpers;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Class BusinessSeeder
 */
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $langs = Language::all();
        $fakers = [
            'ru' => Faker::create('ru_RU'),
            'en' => Faker::create('en_EN'),
            'pl' => Faker::create('pl_PL')
        ];
        $this->saveCategories();
        for ($i = 0; $i <= 20; $i++) {
            $news = new News();
            foreach ($langs as $lang) {
                $faker = $fakers[$lang->lang];
                $name = $faker->realText(20);
                $url = Helpers::transliterate($name);
                $description = $faker->realText(500);
                $news->status = News::STATUS_APPROVED;
                $news->category_id = rand(1, 4);
                $news->setTranslation('title', $lang->lang, $name);
                $news->setTranslation('description', $lang->lang, $description);
                $news->setTranslation('url', $lang->lang, $url);
                $news->setTranslation('seo_title', $lang->lang, $name);
                $news->setTranslation('seo_description', $lang->lang, $description);
                $news->setTranslation('seo_keywords', $lang->lang, $faker->words(4, true));

            }
            $news->save();
            $news->addMediaFromUrl('https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200')
                   ->toMediaCollection('news');
        }
        Schema::enableForeignKeyConstraints();
    }

    protected function saveCategories()
    {
        $categories = [
            ['icon' => 'ic_news.svg', 'name' => 'Новости'],
            ['icon' => 'ic_time.svg', 'name' => 'Финансовая аналитика'],
            ['icon' => 'ic_videoreviews.svg', 'name' => 'Видеообзоры'],
            ['icon' => 'ic_advice.svg', 'name' => 'Полезные советы']
        ];
        foreach ($categories as $category) {
            $newsCategory = new NewsCategory();
            $newsCategory->icon = $category['icon'];
            $newsCategory->setTranslation('title', 'ru', $category['name']);
            $newsCategory->save();
        }
    }


}
