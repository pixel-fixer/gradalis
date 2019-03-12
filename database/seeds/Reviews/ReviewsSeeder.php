<?php

use App\Models\Language;
use Faker\Factory as Faker;
use App\Models\Review\Review;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function run()
    {
        $langs = Language::all();
        $fakers = [
            'ru' => Faker::create('ru_RU'),
            'en' => Faker::create('en_EN'),
            'pl' => Faker::create('pl_PL')
        ];
        for ($i = 0; $i <= 20; $i++) {
            $review = new Review();
            foreach ($langs as $lang) {
                $faker = $fakers[$lang->lang];
                $name = $faker->name;
                $description = $faker->realText(500);
                $review->status = Review::STATUS_APPROVED;
                $review->phone = $faker->phoneNumber;
                $review->email = $faker->unique()->freeEmail;
                $review->setTranslation('name', $lang->lang, $name);
                $review->setTranslation('article', $lang->lang, $description);
                $review->setTranslation('company', $lang->lang, $name);
            }
            $review->save();
            $review->addMediaFromUrl('https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200')
                 ->toMediaCollection('review');
        }
    }
}
