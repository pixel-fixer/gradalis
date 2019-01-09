<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Meeting;

class MeetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meeting::create([
           'travel_id' => 1,
           'name' => 'Первая встреча',
           'description' => 'Информация по первой встрече'
        ]);

        Meeting::create([
           'travel_id' => 1,
           'name' => 'Вторая встреча',
           'description' => 'Информация по второй всрече'
        ]);
    }
}
