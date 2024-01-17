<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;
use \App\Modules\Nhansu\src\Http\Controllers\UngVienController;
use App\Modules\Nhansu\src\Http\Controllers\PhongBanController;


Route::prefix('nhansu')->middleware('web')->name('nhansu.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('users', [NhanVienController::class, 'index'])->name('user.all');
        Route::get('chi_nhanh', [ChiNhanhController::class, 'index'])->name('chiNhanh.index');
        Route::get('tiep_nhan_nhan_su', [ChiNhanhController::class, 'create']);
        Route::get('chi_nhanh', [ChiNhanhController::class, 'all'])->name('chiNhanh.index');
        Route::get('danh-sach-ung-vien', [UngVienController::class, 'danhSach'])->name('danhSachUngVien');
        Route::get('chi-tiet-ung-vien/{id}', [UngVienController::class, 'view'])->name('chiTietUngVien');
        Route::get('/', [NhanVienController::class, 'index'])->name('nhanSu.user.index');
        Route::resource('chi-nhanh', ChiNhanhController::class);

        Route::resource('khoa-phong-ban', PhongBanController::class);
        Route::get('khoa-phong-ban/sodotochuc/{id}', [PhongBanController::class, 'sodotochuc'])->name('khoaphongban.sodotochuc');
        Route::post('khoa-phong-ban/sodotochuc', [PhongBanController::class, 'taoSoDoToChuc'])->name('khoaphongban.sodotochuc.tao');
        Route::get('khoa-phong-ban/sodotochuc/edit/{id}/{phongBanId}', [PhongBanController::class, 'editSoDoToChuc'])->name('khoaphongban.sodotochuc.edit');
        Route::post('khoa-phong-ban/sodotochuc/edit/{id}', [PhongBanController::class, 'updateSoDoToChuc'])->name('khoaphongban.sodotochuc.update');
        Route::get('khoa-phong-ban/sodotochuc/delete/{id}', [PhongBanController::class, 'deleteSoDoToChuc'])->name('khoaphongban.sodotochuc.delete');
    });

    Route::get('khao-sat-ung-vien', [UngVienController::class, 'index']);
    Route::get('khao-sat-ung-vien/{type}/{chiNhanhSlug}', [UngVienController::class, 'viewKhaoSat'])->name('viewKhaoSat');
    Route::post('khao-sat-ung-vien', [UngVienController::class, 'store'])->name('taoUngVien');
    Route::get('thong-tin-nhan-vien', function() {
        return view('Nhansu::nhan_vien.thong_tin');
    });
    Route::get('danh-sach-nhan-vien', function() {
        return view('Nhansu::nhan_vien.danh_sach');
    });
});
