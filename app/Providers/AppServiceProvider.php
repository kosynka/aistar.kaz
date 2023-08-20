<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Services\Contracts\CategoryServiceInterface::class, \App\Services\V1\CategoryService::class);
        $this->app->bind(\App\Services\Contracts\CityServiceInterface::class, \App\Services\V1\CityService::class);
        $this->app->bind(\App\Services\Contracts\AuthServiceInterface::class, \App\Services\V1\AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
