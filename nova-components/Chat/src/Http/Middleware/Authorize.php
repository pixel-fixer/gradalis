<?php

namespace Marketplace\Chat\Http\Middleware;

use Marketplace\Chat\Chat;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(Chat::class)->authorize($request) ? $next($request) : abort(403);
    }
}
