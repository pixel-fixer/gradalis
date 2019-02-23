<?php

use Illuminate\Database\Seeder;
use App\Models\ViewRequest;
use Carbon\Carbon;
use App\Models\Business\Business;
class ObjectRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = Business::whereUserId(1)->get();
        $types = ['view', 'doc'];

        foreach($business as $b){
            ViewRequest::create([
                'user_id' => 1,
                'object_id' => $b->id,
                'object_type' => 'App\Models\Business\Business',
                'type' => $types[rand(0,1)],
                'view_at' => Carbon::now()->addDays(7)
            ]);
        }
    }
}
