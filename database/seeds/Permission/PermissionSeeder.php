<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
        'Чат: модерация сообщений',
        'Чат: модерация сообщений (свои пользователи)',
        'sell',
        'buy'
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        foreach ( $this->allModels as $model ) {
            $resourcePermissions = [
                "create $model"       => "create $model",
                "update $model"       => "update $model",
                "view $model"         => "view $model",
                "delete $model"       => "delete $model",
                "force delete $model" => "force delete $model",
                "restore $model"      => "restore $model",
            ];
            foreach ( $resourcePermissions as $resourcePermission ) {
                Permission::firstOrCreate(
                    ['name' => $resourcePermission],
                    ['guard_name' => 'web']
                );
            }
        }
        foreach ( $this->allPerms as $perm ) {
            Permission::firstOrCreate(
                ['name' => $perm],
                ['guard_name' => 'web']
            );
        }
    }
}
