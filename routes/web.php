<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HazardController;

<<<<<<< HEAD
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:register')->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/map', function () {
        return view('map');
    })->name('map');

    Route::get('/projects', function () {
        return view('project');
    })->name('projects');

    Route::get('/guides', function () {
        return view('guides');
    })->name('guides');
});
=======
Route::get('/', function () {
    return view('dashboard');
});

Route::resource('hazards', HazardController::class);
>>>>>>> 2c84ecf (Update web routes)
