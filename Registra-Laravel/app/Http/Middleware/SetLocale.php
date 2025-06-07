<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    protected $availableLocales = ['en', 'ar'];

    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale'));

        if (!in_array($locale, $this->availableLocales)) {
            $locale = config('app.locale');
        }
        App::setLocale($locale);

        Log::info("Locale set to: {$locale}");

        return $next($request);
    }
}
