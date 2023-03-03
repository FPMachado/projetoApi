<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
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
        if (session('_locale')) {
            app()->setLocale(session('_locale'));
        } elseif ($this->checkLocale($request->lang)) {
            app()->setLocale($request->lang);
            session()->put('_locale', $request->lang);
        }
        return $next($request);
    }

    private function checkLocale(string|null $lang): bool
    {
        return in_array($lang, ['pt-BR', 'en']);
    }
}
