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
use App\Http\Controllers\CampaignDonationController;
use App\Http\Controllers\CategoryDonationController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Staff\CampaignDonationsController;
use App\Http\Controllers\Staff\StaffCategoryDonationController;
use App\Http\Controllers\Staff\StaffEventController;


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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});


Route::middleware(['auth', 'role:staff'])
    ->get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })
    ->name('staff.dashboard');

    
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



// // Rute untuk memilih nominal berdasarkan ID Kampanye
// Route::get('/donasi/saluran/{id}', [CampaignDonationController::class, 'create'])->name('donasi.saluran');

// // Rute untuk memproses simpan data
// Route::post('/donasi/saluran/store', [CampaignDonationController::class, 'store'])->name('donasi.saluran.store');

Route::get('/category-donation/create', [CategoryDonationController::class, 'create'])->name('category.donasi.create');
Route::post('/category-donation/store', [CategoryDonationController::class, 'store'])->name('category.donasi.store');



Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    // Daftarkan route yang error tadi di sini
    Route::get('/donations', [CategoryDonationController::class, 'index'])->name('donations.index');
    Route::resource('campaigns', CampaignDonationsController::class);
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/volunteers', [App\Http\Controllers\VolunteerController::class, 'index'])->name('volunteers.index');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::resource('donations', StaffCategoryDonationController::class);
    Route::resource('events', StaffEventController::class);
    Route::get('/incoming-donations', [CategoryDonationController::class, 'manageIncoming'])->name('staff.incoming.index');
    // Aksi Verifikasi
    Route::post('/incoming-donations/verify/{id}', [CategoryDonationController::class, 'verifyIncoming'])->name('staff.incoming.verify');
    Route::get('/staff/profile', [StaffDashboardController::class, 'profile'])->name('staff.profile');
    Route::post('/staff/profile/update', [StaffDashboardController::class, 'profileUpdate'])->name('staff.profile.update');

// Tambahkan juga rute ini agar tidak error saat klik 'Pesan Masuk'
Route::get('/staff/contacts', [StaffDashboardController::class, 'contactsIndex'])->name('staff.contacts.index');
});
// Route untuk menampilkan daftar relawan
Route::get('/staff/volunteers', [VolunteerController::class, 'index'])->name('staff.volunteers.index');

// TAMBAHKAN INI: Route untuk menghapus relawan
Route::delete('/staff/volunteers/{id}', [VolunteerController::class, 'destroy'])->name('staff.volunteers.destroy');
use App\Http\Controllers\LandingController;
Route::get('/', [LandingController::class, 'index']);


// Rute untuk halaman nominal donasi berdasarkan ID kategori
Route::get('/donation/checkout/{id}', [DonationController::class, 'checkout'])->name('donation.checkout');


Route::post('/donation/store', [CategoryDonationController::class, 'store'])->name('donation.store');

Route::get('/staff/kelola-donasi', [CategoryDonationController::class, 'indexConfirmed'])->name('staff.incoming.index');
Route::post('/staff/verify-donasi/{id}', [CategoryDonationController::class, 'verify'])->name('staff.incoming.verify');


Route::middleware(['auth'])->prefix('staff')->name('staff.')->group(function () {
    // Kelola Pesan Kontak
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Tambahkan ini di dalam Route Group Staff Anda

// Rute untuk profil staff agar error di navbar hilang
Route::get('/staff/profile', [StaffDashboardController::class, 'profile'])->name('staff.profile');
Route::post('/staff/profile/update', [StaffDashboardController::class, 'profileUpdate'])->name('staff.profile.update');

// Tambahkan juga rute ini agar tidak error saat klik 'Pesan Masuk'
Route::get('/staff/contacts', [StaffDashboardController::class, 'contactsIndex'])->name('staff.contacts.index');