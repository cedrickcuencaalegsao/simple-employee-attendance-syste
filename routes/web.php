<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;

Route::middleware('guest')->group(function () {
    Route::get('/', [
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
    Route::get('/addEmployee', [
        AdminController::class,
        'addNewEmployeeIndex'
    ])->name('add.employee');
    Route::get('/checkAttendance/{uuid}', [
        AdminController::class,
        'checkAttendanceIndex'
    ])->name('check.attendance');
    Route::post('/addEmployee', [
        AdminController::class,
        'saveNewEmployee'
    ])->name('save.employee');
});