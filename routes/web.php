<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [
        AuthController::class,
        'index'
    ])->name('login.page');

    Route::post('/login', [
        AuthController::class,
        'login'
    ])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/attendance', [
        AttendanceController::class,
        'index'
    ])->name('view.attendance');
    
    Route::post('/logout',[
        AuthController::class,
        'logout'
    ])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [
        AdminController::class,
        'index'
    ])->name('dashboard');
});