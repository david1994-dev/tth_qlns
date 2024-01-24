<?php

namespace App\Modules;

use App\Modules\Nhansu\src\Models\LoaiNhanVien;
use App\Modules\Nhansu\src\Models\UngVien;
use App\Modules\Nhansu\src\Repositories\Eloquent\ChiNhanhRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\ChiTietNhanVienRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\NhanVienRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\PhongBanRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\SoDoToChucRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\UngVienRepository;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\SoDoToChucRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
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
            NhanVienRepositoryInterface::class,
            NhanVienRepository::class
        );

        $this->app->singleton(
            ChiNhanhRepositoryInterface::class,
            ChiNhanhRepository::class
        );

        $this->app->singleton(
            UngVienRepositoryInterface::class,
            UngVienRepository::class
        );

        $this->app->singleton(
            PhongBanRepositoryInterface::class,
            PhongBanRepository::class
        );

        $this->app->singleton(
            BaoCaoSuCoYKhoaRepositoryInterface::class,
            BaoCaoSuCoYKhoaRepository::class
        );

        $this->app->singleton(
            SoDoToChucRepositoryInterface::class,
            SoDoToChucRepository::class
        );

        $this->app->singleton(
            ChiTietNhanVienRepositoryInterface::class,
            ChiTietNhanVienRepository::class
        );

        $this->app->singleton(
            LoaiNhanVienRepositoryInterface::class,
            LoaiNhanVien::class
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

        if (File::exists($modulePath . "helpers")) {
            $helper_dir = File::allFiles($modulePath . "helpers");
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }
}
