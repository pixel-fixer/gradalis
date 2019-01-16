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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
