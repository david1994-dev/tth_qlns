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
        $this->app->singleton(
            \App\Repositories\Interface\BaseRepositoryInterface::class,
            \App\Repositories\Eloquent\BaseRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Interface\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
