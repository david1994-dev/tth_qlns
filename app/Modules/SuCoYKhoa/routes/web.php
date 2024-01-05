<?php
use Illuminate\Support\Facades\Route;
use App\Modules\SuCoYKhoa\src\Http\Controllers\BaoCaoSuCoYKhoaController;

Route::prefix('sucoykhoa')->middleware('web')->name('sucoykhoa.')->group(function () {
    Route::middleware(['auth'])->group(function () {

    });

    Route::get('bao-cao-su-co', [BaoCaoSuCoYKhoaController::class, 'viewBaoCao'])->name('viewBaoCao');
    Route::post('bao-cao-su-co', [BaoCaoSuCoYKhoaController::class, 'create'])->name('taoBaoCao');
});
