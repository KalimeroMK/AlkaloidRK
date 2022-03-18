<?php

    namespace Modules\Home\Providers;

    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;
    use Modules\Home\ViewComposers\CategoryViewComposer;

    class HomeServiceProvider extends ServiceProvider
    {
        /**
         * @var string $moduleName
         */
        protected string $moduleName = 'Home';

        /**
         * @var string $moduleNameLower
         */
        protected string $moduleNameLower = 'home';

        /**
         * Boot the application events.
         *
         * @return void
         */
        public function boot()
        {
            $this->registerTranslations();
            $this->registerConfig();
            $this->registerViews();
            $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
            view()->composer('home::partials.language_switcher', function ($view) {
                $view->with('current_locale', app()->getLocale());
                $view->with('available_locales', config('app.available_locales'));
            });
            View::composer('home::header', CategoryViewComposer::class);
        }

        /**
         * Register the service provider.
         *
         * @return void
         */
        public function register()
        {
            $this->app->register(RouteServiceProvider::class);
        }

        /**
         * Register config.
         *
         * @return void
         */
        protected function registerConfig()
        {
            $this->publishes([
                module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower.'.php'),
            ], 'config');
            $this->mergeConfigFrom(
                module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
            );
        }

        /**
         * Register views.
         *
         * @return void
         */
        public function registerViews()
        {
            $viewPath = resource_path('views/modules/'.$this->moduleNameLower);

            $sourcePath = module_path($this->moduleName, 'Resources/views');

            $this->publishes([
                $sourcePath => $viewPath,
            ], ['views', $this->moduleNameLower.'-module-views']);

            $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
        }

        /**
         * Register translations.
         *
         * @return void
         */
        public function registerTranslations()
        {
            $langPath = resource_path('lang/modules/'.$this->moduleNameLower);

            if (is_dir($langPath)) {
                $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            } else {
                $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
            }
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides()
        {
            return [];
        }

        private function getPublishableViewPaths(): array
        {
            $paths = [];
            foreach (\Config::get('view.paths') as $path) {
                if (is_dir($path.'/modules/'.$this->moduleNameLower)) {
                    $paths[] = $path.'/modules/'.$this->moduleNameLower;
                }
            }

            return $paths;
        }
    }
