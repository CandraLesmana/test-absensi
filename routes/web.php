<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SlipGajiController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('welcome');
Route::post('/check_in', [LandingController::class, 'check_in'])->name('check_in');
Route::post('/check_out', [LandingController::class, 'check_out'])->name('check_out');

Route::middleware(['guest'])->group(function () {

    Route::get('login', [AuthController::class, 'index'])->name('login.index');
    Route::post('login-post', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    });

    Route::prefix('employee')->group(function() {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    });
    
    Route::prefix('work')->group(function() {
        Route::get('/', [WorkController::class, 'index'])->name('work.index');
        Route::put('/update', [WorkController::class, 'update'])->name('work.update');
    });
    
    Route::prefix('slip_gaji')->group(function() {
        Route::get('/', [SlipGajiController::class, 'index'])->name('slip_gaji.index');
        Route::post('/store', [SlipGajiController::class, 'store'])->name('slip_gaji.store');
    });
});