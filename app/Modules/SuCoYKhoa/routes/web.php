<?php
use Illuminate\Support\Facades\Route;

Route::prefix('sucoykhoa')->middleware('web')->name('sucoykhoa.')->group(function () {
    Route::middleware(['auth'])->group(function () {

    });
});
