<?php

use Illuminate\Database\Seeder;
use App\Models\Chat\Dialog;

class DialogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dialog::create([
           'user_id' => 1,
           'type' => 1,
           'theme' => 'Системное сообщение'
        ]);

        Dialog::create([
           'user_id' => 2,
           'type' => 2,
           'theme' => 'Продажа отеля <a href="">Ссылка на объект отеля</a>',
           'object_id' => 4,
            'object_type' => 'App\Models\Business\Business'
        ]);

        Dialog::create([
           'user_id' => 3,
           'type' => 3,
           'theme' => 'Покупка отеля <a href="">Ссылка на объект отеля</a>',
           'object_id' => 4,
           'object_type' => 'App\Models\Business\Business'
        ]);
    }
}
