<?php

namespace App\Modules;

use File;
use Illuminate\Support\ServiceProvider;

class ServiceModuleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //nhan su module
        $this->app->singleton(
            \App\Repositories\Interface\BaseRepositoryInterface::class,
            \App\Repositories\Eloquent\BaseRepository::class
        );

        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\UserRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\UserRepository::class
        );

        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\EmployeeRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\EmployeeRepository::class
        );

        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\UserRoleRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\UserRoleRepository::class
        );
        $this->commands([
        ]);

        //middlewares
        $middleares = [
            // 'key' => 'namespace của middleare'
            'nhansu' => '\Modules\Nhansu\src\Http\Middlewares',
        ];
//        dd($middleares);
        foreach ($middleares as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->registerModule($moduleName);
        }
    }

    private function registerModule($moduleName)
    {
        $modulePath = __DIR__ . "/$moduleName/";
        if (File::exists($modulePath . "routes/web.php")) {
            $this->loadRoutesFrom($modulePath . "routes/web.php");
        }

        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        if (File::exists($modulePath . "resources/lang")) {
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        if (File::exists($modulePath . "helpers")) {
            $helper_dir = File::allFiles($modulePath . "helpers");
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
