<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{

    /**
     * Все модели для которых нужны разрешения
     *
     */
    private $allModels = [
        'Business',
        'BusinessCategory',
        'City',
        'Consultation',
        'Flight',
        'Franchise',
        'FranchiseCategory',
        'FranchisePackage',
        'Hotel',
        'Meeting',
        'FranchisePackage',
        'Meeting',
        'OrderedService',
        'Service',
        'Travel',
        'User',
    ];

    /**
     * Отдельные разрешения, которые не относятся к моделям
     *
     */
    private $allPerms = [
        'object-sell',
        'object-buy',
        //Чат: модерация сообщений
        'сhat_message-moderate',
        //Чат: модерация сообщений (свои пользователи)
        'сhat_message-moderate-my-users',
        'translate-ru',
        'translate-en',
        'translate-pl',
        'view-translation-ru',
        'view-translation-en',
        'view-translation-pl',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->allModels as $model) {
            $resourcePermissions = [
                "create $model"       => "create $model",
                "update $model"       => "update $model",
                "view $model"         => "view $model",
                "delete $model"       => "delete $model",
                "force delete $model" => "force delete $model",
                "restore $model"      => "restore $model",
            ];
            foreach ($resourcePermissions as $resourcePermission) {
                Permission::firstOrCreate(
                    ['name' => $resourcePermission],
                    ['guard_name' => 'web']
                );
            }
        }
        foreach ($this->allPerms as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm],
                ['guard_name' => 'web']
            );

        }

        User::whereId(1)->first()->assignRole('Продавец');
        User::whereId(4)->first()->assignRole('Покупатель');
        User::where('email', 'content@user.com')->first()->assignRole('Контент менеджер');

        Role::where('name', 'Админ')->first()
            ->givePermissionTo('сhat_message-moderate')
            ->givePermissionTo('translate-ru')
            //->givePermissionTo('translate-en')
            ->givePermissionTo('view-translation-pl');
        Role::where('name', 'Покупатель')->first()->givePermissionTo('object-buy');
        Role::where('name', 'Продавец')->first()->givePermissionTo('object-sell');
        Role::where('name', 'Контент менеджер')->first()->givePermissionTo('translate-ru');
    }
}
