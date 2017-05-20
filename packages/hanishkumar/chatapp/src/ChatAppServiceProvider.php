<?php

namespace Hanish\ChatApp;

use Illuminate\Support\ServiceProvider;

class ChatAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/chatapp'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Hanish\ChatApp\ChatAppController');
        $this->loadViewsFrom(__DIR__.'/views', 'chat');
    }
}
