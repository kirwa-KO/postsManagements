<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MiddlewareLocale
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
        $locale = null;

        if (Auth::check() && !Session::has('locale'))
        {
            $locale = Auth::user()->locale;
            Session::put('locale', $locale);
        }

        if ($request->has('locale'))
        {
            $locale = $request->locale;
            Session::put('locale', $locale);
        }

        $locale = Session::get('locale');

        if ($locale == null)
        {
            $locale = config('app.fallback_locale');
        }

        App::setlocale($locale);

        return $next($request);
    }
}
