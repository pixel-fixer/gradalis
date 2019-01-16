<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Массив всех ролей
     *
     */
    private $allRoles = [
        'Админ',
        'Менеджер',
        'Контент менеджер',
        'Брокер-продавец',
        'Брокер-покупатель',
        'Продавец',
        'Покупатель',
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->allRoles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
