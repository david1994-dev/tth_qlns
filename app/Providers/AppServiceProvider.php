<?php

namespace App\Providers;

use App\Helpers\PaginationHelper;
use App\Helpers\PaginationHelperInterface;
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

        $this->app->singleton(
            \App\Repositories\Interface\UserRoleRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRoleRepository::class
        );

        $this->app->singleton(
            PaginationHelperInterface::class,
            PaginationHelper::class
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
