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
        $managers = User::role('Акаунт-менеджер')->get()->pluck('id');
        factory(User::class, 20)->create()->each(function ($partner) use ($managers) {
            $partner = Partner::create([
               'user_id' => $partner->id,
               'skype' => 'userskype',
               'telegram' => 'usertelegram',
               'apa_id' => rand($managers[0],$managers[1]),
               'hold' => rand(10000,50000),
               'balance' => rand(1000,5000),
               'status' => rand(0,2)
            ]);
            $partner->user->assignRole('Медиа-баер');
        });
        Schema::enableForeignKeyConstraints();
    }
}
