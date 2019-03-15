<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Travel;
use Carbon\Carbon;

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
            'user_id' => 4,
            'date' => Carbon::now()->addDays(14),
            'name' => 'Поездка 1',
            'user_meeting_comment' => 'Комментарий пользователя о встречах',
            'user_consult_comment' =>  'Комментарий пользователя о консультациях'
        ]);

        Travel::create([
            'name' => 'Поездка 2',
            'date' => Carbon::now()->addDays(14),
            'user_id' => 2,
            'user_meeting_comment' => 'Комментарий пользователя о встречах 2',
            'user_consult_comment' =>  'Комментарий пользователя о консультациях 2'
        ]);
    }
}
