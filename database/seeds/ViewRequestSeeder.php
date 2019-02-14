<?php

use Illuminate\Database\Seeder;
use App\Models\ViewRequest;
use Carbon\Carbon;

class ViewRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ViewRequest::create([
            'user_id' => 2,
            'object_id' => 3,
            'object_type' => 'App\Models\Business\Business',
            'view_at' => Carbon::now()->addDays(7)
        ]);

        ViewRequest::create([
            'user_id' => 2,
            'object_id' => 3,
            'object_type' => 'App\Models\Business\Business',
            'view_at' => Carbon::now()->addDays(14)
        ]);

        ViewRequest::create([
            'user_id' => 3,
            'object_id' => 3,
            'object_type' => 'App\Models\Business\Business',
            'view_at' => Carbon::now()->addDays(10)
        ]);
    }
}
