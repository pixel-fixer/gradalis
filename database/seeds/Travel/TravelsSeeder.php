<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Travel;

class TravelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Travel::create([
            'ordered_services_id' => 1,
            'user_id' => 4,
            'user_meeting_comment' => 'Комментарий пользователя о встречах',
            'user_consult_comment' =>  'Комментарий пользователя о консультациях'
        ]);

        Travel::create([
            'ordered_services_id' => 1,
            'user_id' => 2,
            'user_meeting_comment' => 'Комментарий пользователя о встречах 2',
            'user_consult_comment' =>  'Комментарий пользователя о консультациях 2'
        ]);
    }
}
