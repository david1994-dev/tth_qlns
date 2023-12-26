<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;
use \App\Modules\Nhansu\src\Http\Controllers\UngVienController;


Route::middleware(['auth'])->group(function () {
    Route::get('users', [NhanVienController::class, 'index'])->name('nhanSu.user.all');
    Route::get('chi_nhanh', [ChiNhanhController::class, 'index'])->name('nhanSu.chiNhanh.index');
    Route::get('tiep_nhan_nhan_su', [ChiNhanhController::class, 'create']);
    Route::get('/', [NhanVienController::class, 'index'])->name('nhanSu.user.index');
    Route::get('chi_nhanh', [ChiNhanhController::class, 'all'])->name('nhanSu.chiNhanh.index');
    Route::get('danh-sach-ung-vien', [UngVienController::class, 'danhSach'])->name('danhSachUngVien');
});

Route::get('khao-sat-ung-vien/{type}', [UngVienController::class, 'index']);
Route::post('khao-sat-ung-vien', [UngVienController::class, 'store'])->name('taoUngVien');
