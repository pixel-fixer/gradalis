<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentTransaction;

class PaymentTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentTransaction::create([
            'user_id' => 1,
            'sum' => '330',
            'status' => 0,
            'type_id' => 1,
            'description' => 'Кредитной картой *4567'
        ]);

        PaymentTransaction::create([
            'user_id' => 1,
            'sum' => '120',
            'status' => 1,
            'type_id' => 2,
            'description' => 'Paypal'
        ]);

        PaymentTransaction::create([
            'user_id' => 1,
            'sum' => '2000',
            'status' => 1,
            'type_id' => 3,
            'description' => 'Skrill'
        ]);
    }
}
