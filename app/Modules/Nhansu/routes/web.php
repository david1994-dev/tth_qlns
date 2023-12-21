<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;


Route::middleware(['auth'])->group(function () {
    Route::get('users', [NhanVienController::class, 'all'])->name('nhanSu.user.all');
    Route::get('chi_nhanh', [ChiNhanhController::class, 'all'])->name('nhanSu.chiNhanh.index');
});
