<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

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

Route::middleware('auth')->group(function () {
    Route::get('/donasi/create', [DonationController::class, 'create'])->name('donasi.create');
    Route::post('/donasi', [DonationController::class, 'store'])->name('donasi.store');
});

