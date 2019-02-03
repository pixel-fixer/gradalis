<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('layouts.app', function($view)
        // {
        //     $user = [
        //         'notifications' => Auth::check() ? Auth::user()->unreadNotifications: null,
        //         'avatar' => Auth::user()->avatar
        //     ];
            
        //     $view->with('user', $user);
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
