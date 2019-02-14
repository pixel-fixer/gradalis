<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $subscribes = [
            'ordered_service_status' => false,
            'new_message'            => false,
            'personal_selection'     => false,
            'offer'                  => false,
        ];

        $cities = [1, 2562]; //Москва и Варшава

        // Add the master administrator, user id of 1
        User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Istrator',
            'email'             => 'admin@admin.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'subscribes'        => $subscribes,
            'city_id' => $cities[rand(0,1)],
            'sum_from' => 10000,
            'sum_to' => 1000000
        ]);

        User::create([
            'first_name'        => 'Backend',
            'last_name'         => 'User',
            'email'             => 'executive@executive.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'subscribes'        => $subscribes,
            'city_id' => $cities[rand(0,1)],
            'sum_from' => 10000,
            'sum_to' => 1000000
        ]);

        User::create([
            'first_name'        => 'Default',
            'last_name'         => 'User',
            'email'             => 'user@user.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'subscribes'        => $subscribes,
            'city_id' => $cities[rand(0,1)],
            'sum_from' => 10000,
            'sum_to' => 1000000
        ]);

        $this->enableForeignKeys();
    }
}
