<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;


Route::middleware(['auth'])->group(function () {
    Route::get('users', [NhanVienController::class, 'index'])->name('nhanSu.user.all');
    Route::get('chi_nhanh', [ChiNhanhController::class, 'index'])->name('nhanSu.chiNhanh.index');
    Route::get('tiep_nhan_nhan_su', [ChiNhanhController::class, 'create']);
    Route::get('khao_sat1', [ChiNhanhController::class, 'khaoSat1']);
    Route::get('khao_sat2', [ChiNhanhController::class, 'khaoSat2']);
    Route::get('khao_sat3', [ChiNhanhController::class, 'khaoSat3']);
});
