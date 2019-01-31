<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAjaxRequestsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_unless($request->wantsJson(), 403);
        
        return $next($request);
    }
}
