<?php

namespace App\Http\Controllers;

use App\Models\Business\Business;
use App\Models\Referral\Partner;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
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
            $user->notifications = $user->unreadNotifications;
            $partner = Partner::where('user_id',$user->id)->first();
        }else{
            $user = null;
            $partner = null;
        }

        header('Content-Type: text/javascript');
        echo('window.user = ' . json_encode($user) . ';');
        echo('window.partner = ' . json_encode($partner) . ';');
        exit();
    }
}
