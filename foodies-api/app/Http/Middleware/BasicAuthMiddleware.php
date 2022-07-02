<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('x-api-token')) {
            if ($request->header('x-api-token') === 'YTFhMWYzN2') {
                return $next($request);
            }
        }

        return response('Unauthorized.', 401);
    }
}
