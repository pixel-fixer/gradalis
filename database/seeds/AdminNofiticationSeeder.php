<?php

use Illuminate\Database\Seeder;
use App\Models\AdminNotification;

class AdminNofiticationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminNotification::create([
            'text'        => 'Описание уведомления',
            'action_link' => '<a href="">Ссылка на действие</a>',
            'status'      => 'new'
        ]);

        AdminNotification::create([
            'text'        => 'Описание уведомления 1',
            'action_link' => '<a href="">Ссылка на действие 2</a>',
            'status'      => 'read'
        ]);

        AdminNotification::create([
            'text'        => 'Описание уведомления 2',
            'action_link' => '<a href="">Ссылка на действие 3</a>',
            'status'      => 'done'
        ]);
    }
}
