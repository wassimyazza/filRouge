<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\BaseRepositoryInterface::class,
            \App\Repositories\BaseRepository::class
        );

        $this->app->bind(
            \App\Repositories\UserRepository::class,
            function ($app) {
                return new \App\Repositories\UserRepository(new \App\Models\User());
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}