<?php

namespace App\Modules;

use App\Modules\SuCoYKhoa\src\Repositories\Eloquent\BaoCaoSuCoYKhoaRepository;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //nhan su module
        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\NhanVienRepository::class
        );

        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\ChiNhanhRepository::class
        );

        $this->app->singleton(
            \App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface::class,
            \App\Modules\Nhansu\src\Repositories\Eloquent\UngVienRepository::class
        );

        $this->app->singleton(
            BaoCaoSuCoYKhoaRepositoryInterface::class,
            BaoCaoSuCoYKhoaRepository::class
        );
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
