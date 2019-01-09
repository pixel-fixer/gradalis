<?php

use Illuminate\Database\Seeder;
use App\Models\Service\OrderedService;

class OrderedServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderedService::create([
            'service_id' => 1,
            'status' => 1,
            'admin_comment' => 'admin comment',
            'user_comment' => 'user comment',
            'user_id' => 1
        ]);
    }
}
