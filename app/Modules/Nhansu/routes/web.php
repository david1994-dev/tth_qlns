<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Nhansu\src\Http\Controllers\UserController;


Route::get('users', [UserController::class, 'all'])->name('user.all');
