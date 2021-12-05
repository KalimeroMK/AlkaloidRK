<?php

    namespace App\Providers;

    use App\Http\ViewComposers\CategoryViewComposer;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

    class ViewServiceProvider extends ServiceProvider
    {
        public function register()
        {
            //
        }

        public function boot()
        {
            View::composer('theme.header', CategoryViewComposer::class);
        }
    }