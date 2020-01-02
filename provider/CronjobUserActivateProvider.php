<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class CronjobUserActivateProvider
 * @package App\Providers
 */
class CronjobUserActivateProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migration');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/emails', 'emails');
    }
}
