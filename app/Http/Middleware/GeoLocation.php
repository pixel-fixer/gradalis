<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App;

class GeoLocation
{
    /**
     * Определяем гео-локацию по IP. Можно было использовать популярный https://github.com/Torann/laravel-geoip,
     * но он тянет странные зависимости, пока не стал ставить. Пока обычный реквест на http://ip-api.com
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('ip_info')){
            $client = new \GuzzleHttp\Client();

            /*
            TODO добавить дефолтный локэйшн?
            */
            if(App::environment('local')){
                $ip = '77.222.98.94';
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $url = 'http://ip-api.com/php/'.$ip;
            $response = $client->request('GET', $url);
            Session::put('ip_info', unserialize($response->getBody()->getContents()));
        }
        return $next($request);
    }
}
