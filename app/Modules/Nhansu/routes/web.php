<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;
use \App\Modules\Nhansu\src\Http\Controllers\UngVienController;
use App\Modules\Nhansu\src\Http\Controllers\PhongBanController;
use App\Modules\Nhansu\src\Http\Controllers\SoDoToChucController;
use App\Modules\Nhansu\src\Http\Controllers\LoaiNhanVienController;


Route::prefix('nhansu')->middleware(['web', 'setDefaultValue'])->name('nhansu.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('danh-sach-ung-vien', [UngVienController::class, 'danhSach'])->name('danhSachUngVien');
        Route::delete('delete-ung-vien/{id}', [UngVienController::class, 'destroy'])->name('ung-vien.destroy');
        Route::get('chi-tiet-ung-vien/{id}', [UngVienController::class, 'view'])->name('chiTietUngVien');
//        Route::resource('nhan-vien', NhanVienController::class);
        Route::resource('chi-nhanh', ChiNhanhController::class);
        Route::resource('khoa-phong-ban', PhongBanController::class);
        Route::get('khoa-phong-ban/sodotochuc/{id}', [PhongBanController::class, 'sodotochuc'])->name('khoaphongban.sodotochuc');
        Route::resource('so-do-to-chuc', SoDoToChucController::class);
        Route::resource('nhan-vien', NhanVienController::class);
        Route::post('chuyen-ung-vien{id}', [NhanVienController::class, 'chuyenUngVien'])->name('nhansu.nhan-vien.chuyenUngVien');
        Route::resource('loai-nhan-vien', LoaiNhanVienController::class);
    });

    Route::get('khao-sat-ung-vien', [UngVienController::class, 'index']);
    Route::get('khao-sat-ung-vien/{type}/{chiNhanhSlug}', [UngVienController::class, 'viewKhaoSat'])->name('viewKhaoSat');
    Route::post('khao-sat-ung-vien', [UngVienController::class, 'store'])->name('taoUngVien');

});
