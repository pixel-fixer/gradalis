<?php

use App\Models\Auth\User;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Partner;
use Illuminate\Database\Seeder;

class ReferralUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        InvitationCounter::flushEventListeners();
        //Заполнение акаунт-менеджеров
        $i = 1;
        factory(User::class, 2)->make()->each(function ($user) use (&$i) {
            $user->email = 'manager' . $i . '@manager.com';
            $user->assignRole('Акаунт-менеджер');
            $user->save();
            Partner::create([
                'user_id'  => $user->id,
                'skype'    => 'userskype',
                'telegram' => 'usertelegram',
                'apa_id'   => null,
                'hold'     => rand(10000, 50000),
                'balance'  => rand(1000, 5000),
                'status'   => rand(0, 2)
            ]);
            $i++;
        });

        $invitations = InvitationCounter::where('status', '>=', 1)->get()->unique('user_id');
        foreach ($invitations as $invitation) {
            $user = User::find($invitation->user_id);
            if ($invitation->status == 1) {
                $user->assignRole('Продавец');
            } elseif ($invitation->status == 2) {
                $user->assignRole('Покупатель');
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
