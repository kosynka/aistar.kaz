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
        /**
         * Services list
         */
        $this->app->bind(\App\Services\Contracts\CityServiceInterface::class, \App\Services\V1\CityService::class);

        /**
         * Repositories list
         */
        $this->app->bind(\App\Repositories\Contracts\CityRepositoryInterface::class, \App\Repositories\V1\CityRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
