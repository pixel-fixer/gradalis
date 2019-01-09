<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Hotel;
use Carbon\Carbon;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'travel_id' => 1,
            'check_in_date' => Carbon::now()->addDays(7),
            'check_out_date' => Carbon::now()->addDays(14),
            'address' => 'Krakowskie Przedmieście 42/44, 00-325 Warszawa',
            'phone' => '+48 22 551 10 00',
            'url' => 'http://marriott.com'
        ]);
    }
}
