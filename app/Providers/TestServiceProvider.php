<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test', 'App\Services\Test');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
