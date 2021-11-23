<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Session;

    class LocalizationMiddleware
    {
        public function handle($request, Closure $next)
        {
            if (!in_array(Session::get('locale'), ['en', 'mk'])) {
                $locale = 'mk';
                Session::put('locale', $locale);
            }
            if (Session::has('locale')) {
                App::setlocale(Session::get('locale'));
            }
            return $next($request);
        }
    }