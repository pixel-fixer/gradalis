<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BelongsToAuthUser
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
        $model = $request->route($param);

        if($model->user_id == Auth::id())
            return $next($request);
        else
            return response(['message' => "${param} not belongs to current user"], 403);
    }
}
