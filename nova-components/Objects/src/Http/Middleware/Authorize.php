<?php

namespace Marketplace\Objects\Http\Middleware;

use Marketplace\Objects\Objects;

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
        return resolve(Objects::class)->authorize($request) ? $next($request) : abort(403);
    }
}
