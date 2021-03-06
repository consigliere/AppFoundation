<?php

namespace App\Components\AppFoundation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AppFoundationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\App\Components\LogDB\Providers\LogDBServiceProvider::class);
        $this->app->register(\App\Components\AppFoundation\Providers\PaginationServiceProvider::class);
        $this->app->register(\App\Components\AppFoundation\Providers\QueryBasicServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../../Config/config.php' => config_path('appfoundation.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../../Config/config.php', 'appfoundation'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/components/appfoundation');

        $sourcePath = __DIR__.'/../../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/components/appfoundation';
        }, \Config::get('view.paths')), [$sourcePath]), 'appfoundation');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/components/appfoundation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'appfoundation');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../../Resources/lang', 'appfoundation');
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
}
