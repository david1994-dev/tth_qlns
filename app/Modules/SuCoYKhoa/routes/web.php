<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\NhanVienController;
use App\Modules\Nhansu\src\Http\Controllers\ChiNhanhController;
use \App\Modules\Nhansu\src\Http\Controllers\UngVienController;

Route::prefix('sucoykhoa')->middleware('web')->name('sucoykhoa.')->group(function () {
    Route::middleware(['auth'])->group(function () {


    });
});
