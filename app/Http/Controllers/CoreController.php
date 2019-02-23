<?php

namespace App\Http\Controllers;

use App\Models\Business\Business;
use Auth;
class CoreController extends Controller
{
    public function lang()
    {
        //    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

//        return $strings});
        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        exit();
    }
  
    public function user()
    {
        if(Auth::check()){
            $user = Auth::user()->load(['roles']);
            $user->canModerateMessages = $user->canModerateMessages();
            $user->permissions = $user->getPermissionsViaRoles();
        }else{
            $user = null; 
        }

        header('Content-Type: text/javascript');
        echo('window.user = ' . json_encode($user) . ';');
        exit();
    }
}
