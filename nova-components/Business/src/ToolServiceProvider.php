<?php

namespace Marketplace\Business;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Marketplace\Business\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'business');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            $lang = config('app.locale');

            $files = glob(resource_path('lang/' . $lang . '/*.php'));
            $strings = [];

            foreach ($files as $file) {
                $name = basename($file, '.php');
                $strings[$name] = require $file;
            }

            $locales = array_map(function ($value) {
                return __($value);
            }, config('translatable.locales'));
            $languages = [];
            $view_languages = [];
            foreach ($locales as $lang => $locale) {
                if (auth()->user()->hasPermissionTo("translate-{$lang}")) {
                    $languages[$lang] = $locale;
                } elseif (auth()->user()->hasPermissionTo("view-translation-{$lang}")) {
                    $view_languages[$lang] = $locale;
                }

            }
            $data = [
                'locales'     => $languages,
                'view_locales'     => $view_languages,
                'indexLocale' => key($languages)
            ];

            Nova::provideToScript([
                'i18n'    => $strings,
                'locales' => $data,
            ]);
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/business')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
