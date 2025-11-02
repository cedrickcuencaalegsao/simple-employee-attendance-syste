<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [
        AuthController::class,
        'index',
    ])->name('login.page');

    Route::post('/login', [
        AuthController::class,
        'login',
    ])->name('login');

    Route::get('/timeIn', [
        AttendanceController::class,
        'timeInIndex',
    ])->name('time.in.index');
    Route::post('/timeIn', [
        AttendanceController::class,
        'timeIn',
    ])->name('time.in');
    Route::get('/timeOut', [
        AttendanceController::class,
        'timeOutIndex',
    ])->name('time.out.index');
    Route::post('/timeOut', [
        AttendanceController::class,
        'timeOut',
    ])->name('time.out');

    Route::get('/send-otp', [OTPController::class, 'viewSentOTP'])->name('password.request');
    Route::post('/send-otp', [OTPController::class, 'sendOTP'])->name('sendOTP');
    Route::get('/verify-otp', [OTPController::class, 'viewVerifyOTP'])->name('verifyOTP');
    Route::post('/verify-otp', [OTPController::class, 'verifyOTP'])->name('password.otp.verify');
});

Route::middleware('auth')->group(function () {
    Route::get('/attendance', [
        AttendanceController::class,
        'index',
    ])->name('view.attendance');

    Route::post('/logout', [
        AuthController::class,
        'logout',
    ])->name('logout');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [
        AdminController::class,
        'index',
    ])->name('dashboard');
    Route::get('/addEmployee', [
        AdminController::class,
        'addNewEmployeeIndex',
    ])->name('add.employee');
    Route::get('/checkAttendance/{uuid}', [
        AdminController::class,
        'checkAttendanceIndex',
    ])->name('check.attendance');
    Route::post('/addEmployee', [
        AdminController::class,
        'saveNewEmployee',
    ])->name('save.employee');
    Route::get('/edit-employee/{uuid}', [
        AdminController::class,
        'editEmployee',
    ])->name('edit.employee');
    Route::post('/edit-employee', [
        AdminController::class,
        'saveEditEmploye',
    ])->name('save.edit.employee');
    Route::post('/delete-employee', [
        AdminController::class,
        'delete',
    ])->name('delete.employee');
});
