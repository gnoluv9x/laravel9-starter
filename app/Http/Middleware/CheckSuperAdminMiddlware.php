<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperAdminMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!checkSuperAdminPerm()) {
            return back()->with(['error', "You don't has permission"]);
        }

        return $next($request);
    }
}
