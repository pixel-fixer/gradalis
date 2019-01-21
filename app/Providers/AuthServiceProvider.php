<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Auth\User'         => 'App\Policies\UserPolicy',
        'App\Models\AdminNotification' => 'App\Policies\AdminNotificationPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Дает админу все права без прямого назначения в бд
        Gate::before(function ($user) {
            if ($user->hasRole('Админ')) {
                return true;
            }
        });
    }
}
