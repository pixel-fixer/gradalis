<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
           'lang' => 'ru',
           'name' => 'Русский'
        ]);

        Language::create([
           'lang' => 'pl',
           'name' => 'Polski'
        ]);

        Language::create([
           'lang' => 'en',
           'name' => 'English'
        ]);
    }
}
