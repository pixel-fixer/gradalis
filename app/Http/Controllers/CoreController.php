<?php

namespace App\Http\Controllers;

use App\Models\Referral\Partner;
use Auth;

class CoreController extends Controller
{
    public function lang()
    {
        //    $strings = Cache::rememberForever('lang.js', function () {
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
        foreach ($locales as $lang => $locale) {
            if ($lang == app()->getLocale()) {
                $languages[$lang] = $locale;
            } elseif (auth()->user()->hasPermissionTo("translate-{$lang}")) {
                $languages[$lang] = $locale;
            }

        }
        $data = [
            'locales'     => $languages,
            'indexLocale' => app()->getLocale()
        ];

        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        echo('window.locales = ' . json_encode($data) . ';');
        exit();
    }

    public function user()
    {
        if (Auth::check()) {
            $user = Auth::user()->load(['roles']);
            $user->canModerateMessages = $user->canModerateMessages();
            $user->permissions = $user->getPermissionsViaRoles();
            $partner = Partner::where('user_id', $user->id)->first();
        } else {
            $user = null;
            $partner = null;
        }

        header('Content-Type: text/javascript');
        echo('window.user = ' . json_encode($user) . ';');
        echo('window.partner = ' . json_encode($partner) . ';');
        exit();
    }
}
