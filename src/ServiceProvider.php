<?php

namespace Christhompsontldr\LaravelAsana;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

class ServiceProvider extends ServiceProvider
{
    protected $listen = [
        \Christhompsontldr\LaravelAsana\Events\AsanaResponse::class => [
            \Christhompsontldr\LaravelAsana\Listeners\RemoveAsanaFollower::class,
        ],
    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__) . '/config/asana.php' => config_path('asana.php'),
        ]);

        $this->commands([
            \Christhompsontldr\LaravelAsana\Commands\CustomFields::class,
            \Christhompsontldr\LaravelAsana\Commands\Users::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAsanaService();

        if ($this->app->runningInConsole()) {
            $this->registerResources();
        }

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/asana.php', 'asana'
        );
    }

    /**
     * Register the Asana service.
     *
     * @return void
     */
    public function registerAsanaService()
    {
        $this->app->singleton('christhompsontldr.asana', function ($app) {
            $config = $app->config->get('asana', []);

            return new Asana($config);
        });
    }

    /**
     * Register Asana resources.
     *
     * @return void
     */
    public function registerResources()
    {
        if ($this->isLumen() === false) {
            $this->publishes([
                __DIR__ . '/../config/asana.php' => config_path('asana.php'),
            ], 'config');
        }
    }

    /**
     * Check if package is running under Lumen app
     *
     * @return bool
     */
    protected function isLumen()
    {
        return Str::contains($this->app->version(), 'Lumen') === true;
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
