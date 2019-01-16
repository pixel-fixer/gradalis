<?php

use App\Models\Auth\User;
use App\Models\Referral\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $users = User::all();
        foreach ($users as $user){
            Partner::create([
               'user_id' => $user->id,
               'balance' => 0,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
