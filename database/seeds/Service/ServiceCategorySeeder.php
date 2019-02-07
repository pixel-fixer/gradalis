<?php

use Illuminate\Database\Seeder;
use App\Models\Service\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::create([
            'name' =>[
                'ru' => 'Услуги и документы',
                'en' => 'Services and Documents',
                'pl' => 'Usługi i dokumenty'
            ]
        ]);

        ServiceCategory::create([
            'name' =>[
                'ru' => 'Услуги и документы 2',
                'en' => 'Services and Documents 2',
                'pl' => 'Usługi i dokumenty 2'
            ]
        ]);

        ServiceCategory::create([
            'name' =>[
                'ru' => 'Услуги и документы 3',
                'en' => 'Services and Documents 3',
                'pl' => 'Usługi i dokumenty 3'
            ]
        ]);
    }
}
