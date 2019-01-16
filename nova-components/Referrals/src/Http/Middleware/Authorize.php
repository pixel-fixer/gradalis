<?php

namespace Marketplace\Referrals\Http\Middleware;

use Marketplace\Referrals\Referrals;

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
        return resolve(Referrals::class)->authorize($request) ? $next($request) : abort(403);
    }
}
