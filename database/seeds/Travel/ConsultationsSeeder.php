<?php

use Illuminate\Database\Seeder;
use App\Models\Travel\Consultation;
use Carbon\Carbon;

class ConsultationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consultation::create([
           'travel_id' => 1,
            'theme' => 'Тема консультации',
            'date' => Carbon::now()->addDays('10'),
            'description' => 'Комментарий для первой консультации'
        ]);

        Consultation::create([
           'travel_id' => 1,
            'theme' => 'Тема второй консультации',
            'date' => Carbon::now()->addDays('11'),
            'description' => 'Комментарий для второй консультации'
        ]);
    }
}
