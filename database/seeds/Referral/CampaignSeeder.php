<?php

use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $businesses = Business::all();
        $franshises = Franchise::all();
        foreach ($businesses as $business) {
            $names = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            Campaign::create([
                'name' => json_encode($names),
                'target_id' => $business->id,
                'type' => 1,
                'status'=> rand(0,1)
            ]);
        }
        foreach ($franshises as $franshise) {
            $names = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            Campaign::create([
                'name' => json_encode($names),
                'target_id' => $franshise->id,
                'type' => 2,
                'status'=> rand(0,1)
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
