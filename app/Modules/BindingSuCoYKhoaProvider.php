<?php

namespace App\Modules;

use App\Modules\SuCoYKhoa\src\Repositories\Eloquent\BaoCaoSuCoYKhoaRepository;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BindingSuCoYKhoaProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            BaoCaoSuCoYKhoaRepositoryInterface::class,
            BaoCaoSuCoYKhoaRepository::class
        );
    }
}
