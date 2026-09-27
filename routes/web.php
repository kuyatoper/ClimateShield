<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HazardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:register')->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/map', [MapController::class, 'index'])
    ->name('map');

    Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects');

    Route::get('/guides', function () {
        return view('guides');
    })->name('guides');

    Route::post('/hazards/report', [HazardController::class, 'report'])
    ->name('hazards.report');

    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('admin')
        ->name('admin.dashboard');

    Route::resource('/admin/hazards', HazardController::class)
        ->middleware('admin');

    Route::resource('/admin/projects', AdminProjectController::class)
    ->middleware('admin');
        
});