<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleRedirect
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
        if ($request->segment(1) === config('app.fallback_locale')) {
            return redirect('/', 301);
        }

        return $next($request);
    }
}
