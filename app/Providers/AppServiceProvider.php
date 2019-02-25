<?php

namespace App\Providers;

use App\Models\Referral\InvitationCounter;
use App\Observers\InvitationObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //TODO почему то не работает
        $locale = config('app.locale');
        setlocale(LC_TIME, $locale.'_'.strtoupper($locale).'.UTF-8');
        Carbon::setLocale($locale);
        InvitationCounter::observe(InvitationObserver::class);
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
