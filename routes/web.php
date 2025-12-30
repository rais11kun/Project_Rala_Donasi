<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VolunteerController;


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

    Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
})->name('staff.dashboard');
    
Route::get('/donasi/{category}', [DonationController::class, 'showByCategory'])->name('donasi.category');

// --- ALUR DONASI ---
Route::get('/donasi', [DonationController::class, 'index'])->name('donasi.index');
// Memproses data donasi (setelah klik 'Selanjutnya')
Route::post('/donasi/proses', [DonationController::class, 'proses'])->name('donasi.proses');

// // --- ALUR RELAWAN ---
// // Menampilkan halaman formulir pendaftaran relawan
// Route::get('/relawan/daftar/{event_id}', [EventController::class, 'daftarRelawan'])->name('relawan.daftar');
// // Memproses pendaftaran relawan
// Route::post('/relawan/simpan', [EventController::class, 'store'])->name('relawan.simpan');

// Route untuk menampilkan halaman sukses/konfirmasi
Route::get('/donasi/konfirmasi/{id}', [DonationController::class, 'confirmation'])->name('donasi.confirmation');

// Route untuk memproses form
Route::post('/donasi/store', [DonationController::class, 'store'])->name('donasi.store');

// Ini untuk menampilkan landing page
// Route::get('/', function () { return view('landing'); }); 

// TAMBAHKAN INI untuk menangani pengiriman pesan
Route::post('/contact-send', [ContactController::class, 'store'])->name('contact.send');

// Pastikan baris ini mengarah ke method 'create'
Route::get('/relawan/daftar/{id}', [VolunteerController::class, 'create'])->name('relawan.daftar');

// Pastikan baris ini untuk menyimpan data
Route::post('/volunteer/register', [VolunteerController::class, 'store'])->name('volunteer.register');