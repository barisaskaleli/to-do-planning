<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // setting up repositories

        $this->app->bind(
            \App\Interfaces\TaskRepositoryInterface::class,
            \App\Repositories\TaskRepository::class
        );

        $this->app->bind(
            \App\Interfaces\DeveloperRepositoryInterface::class,
            \App\Repositories\DeveloperRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
