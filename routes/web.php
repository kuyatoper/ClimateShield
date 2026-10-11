
<?php

use App\Http\Controllers\AdminDonationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EnvironmentalHistoryController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HazardController;
use Illuminate\Support\Facades\Route;

// Guest authentication routes
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:login')
        ->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:register')
        ->name('register.store');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Public donation routes
Route::get('/projects/{project}/donate', [
    DonationController::class,
    'create',
])->name('donations.create');

Route::post('/projects/{project}/donate', [
    DonationController::class,
    'store',
])->name('donations.store');

// Authenticated user routes
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

    Route::get('/environmental-history', [
        EnvironmentalHistoryController::class,
        'index',
    ])->name('environmental-history');

    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('admin')
        ->name('admin.dashboard');

    // Admin hazard management
    Route::resource('/admin/hazards', HazardController::class)
        ->middleware('admin');

    Route::resource('/admin/projects', AdminProjectController::class)
        ->middleware('admin');

    // Hazard verification
    Route::post('/hazards/{hazard}/verify', [
        HazardController::class,
        'verify',
    ])->name('hazards.verify');

    Route::post('/hazards/{hazard}/reject', [
        HazardController::class,
        'reject',
    ])->name('hazards.reject');

    // Admin donation management
    Route::middleware('admin')->group(function (): void {

        Route::get('/donations', [
            AdminDonationController::class,
            'index',
        ])->name('donations.index');

        Route::get('/donations/{donation}/proof', [
            AdminDonationController::class,
            'proof',
        ])->name('donations.proof');

        Route::post('/donations/{donation}/approve', [
            AdminDonationController::class,
            'approve',
        ])->name('donations.approve');

        Route::post('/donations/{donation}/reject', [
            AdminDonationController::class,
            'reject',
        ])->name('donations.reject');
    });
});
