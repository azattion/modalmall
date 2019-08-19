<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $access = isset($_COOKIE['asdfgfggh']) ? $_COOKIE['asdfgfggh'] : "";
        if ($access !== 'tyunbdgcsxl') {
            abort(404, 'Сайт в разработке');
        }
        return $next($request);
    }
}
