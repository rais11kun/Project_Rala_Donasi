<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardAdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ADMIN
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return 'Dashboard Admin';
});

// STAFF
Route::middleware(['auth', 'role:staff'])->get('/staff/dashboard', function () {
    return 'Dashboard Staff';
});


Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/admin/donasi', [DonationController::class, 'index'])->name('donasi.index');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/donations', [AdminDonationController::class, 'index'])
        ->name('admin.donations.index');

    Route::patch('/donations/{donation}/approve', [AdminDonationController::class, 'approve'])
        ->name('admin.donations.approve');

    Route::patch('/donations/{donation}/reject', [AdminDonationController::class, 'reject'])
        ->name('admin.donations.reject');
});

// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])
//         ->name('admin.dashboard');
// });

// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [DashboardAdminController::class, 'index'])
//         ->name('admin.dashboard');
// });

// Route::middleware(['auth', 'role:admin'])
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])
//             ->name('admin.dashboard');
//     });

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])
            ->name('dashboard');

    });

use App\Http\Controllers\Admin\StaffController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('staff', StaffController::class);
});


use App\Http\Controllers\Admin\CategoryController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('categories', CategoryController::class);
    });


Route::middleware(['auth'])->group(function () {
    Route::get('/donasi/create', [DonationController::class, 'create'])
        ->name('donasi.create');

    Route::post('/donasi', [DonationController::class, 'store'])
        ->name('donasi.store');
});

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/activity-log', [\App\Http\Controllers\Admin\ActivityLogController::class, 'index'])
            ->name('activity-log.index');
    });

    



