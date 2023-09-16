<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('filter', 'App\Services\Filter');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
