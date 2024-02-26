<?php

namespace App\Modules;

use App\Modules\Nhansu\src\Repositories\Eloquent\ChiNhanhRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\ChiTietNhanVienRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\LoaiNhanVienRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\LoaiThongBaoRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\NhanVienRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\NhomNhanSuRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\PhongBanRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\SoDoToChucRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\ThongBaoPhanHoiRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\ThongBaoRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\ThongBaoUserRepository;
use App\Modules\Nhansu\src\Repositories\Eloquent\UngVienRepository;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiThongBaoRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhomNhanSuRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\SoDoToChucRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoPhanHoiRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoUserRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use App\Modules\SuCoYKhoa\src\Repositories\Eloquent\BaoCaoSuCoYKhoaRepository;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindingNhanSuProvider extends ServiceProvider
{
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
            LoaiNhanVienRepository::class
        );

        $this->app->singleton(
            ThongBaoRepositoryInterface::class,
            ThongBaoRepository::class
        );
        $this->app->singleton(
            ThongBaoUserRepositoryInterface::class,
            ThongBaoUserRepository::class
        );
        $this->app->singleton(
            LoaiThongBaoRepositoryInterface::class,
            LoaiThongBaoRepository::class
        );
        $this->app->singleton(
            NhomNhanSuRepositoryInterface::class,
            NhomNhanSuRepository::class
        );
        $this->app->singleton(
            ThongBaoPhanHoiRepositoryInterface::class,
            ThongBaoPhanHoiRepository::class
        );
    }
}
