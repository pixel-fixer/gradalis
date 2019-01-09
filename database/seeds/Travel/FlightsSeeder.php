<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Flight;
use Carbon\Carbon;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flight::create([
            'travel_id' => 1,
            'in_time' => Carbon::now()->addDays(7),
            'out_time' =>  Carbon::now()->addDays(14),
            'in_city' => 'Москва',
            'out_city' => 'Варшава',
            'aeroport' => ''
        ]);
    }
}
