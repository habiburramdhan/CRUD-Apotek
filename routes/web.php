<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AkunController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat untuk mendaftarkan route web untuk aplikasi Anda.
| Route ini dimuat oleh RouteServiceProvider dan semuanya akan
| diberi kelompok middleware "web". Buatlah sesuatu yang hebat!
|
*/

// Route untuk halaman kelola
Route::get('/kelola', function () {
    return view('kelola.index');
});

// Struktur routing Laravel:
// Route::httpMethod('/nama-path', [NamaController::class, 'namaFunc'])->name('identitas_route');

// Middleware untuk guest (pengguna yang belum login)
Route::middleware(['isGuest'])->group(function() {
    Route::get('/', [AkunController::class, 'login'])->name('login');
    Route::post('/login', [AkunController::class, 'loginAuth'])->name('login.auth');
});

// Middleware untuk pengguna yang sudah login
Route::middleware(['IsLogin'])->group(function() {
    Route::post('/logout', [AkunController::class, 'logout'])->name('logout');
    Route::get('/home', function () { 
        return view('home');
    })->name('home.page');

    // Middleware untuk admin
    Route::middleware(['isAdmin'])->group(function() {
        // Route untuk pengguna
        Route::prefix('/users')->name('users.')->group(function(){
            // Route untuk pengguna dapat ditambahkan di sini
        });

        // Route untuk medicine
        Route::prefix('/medicine')->name('medicine.')->group(function() {
            Route::get('create', [MedicineController::class, 'create'])->name('create');
            Route::post('store', [MedicineController::class, 'store'])->name('store');
            Route::get('/', [MedicineController::class, 'index'])->name('home');
            Route::get('{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/data/stock', [MedicineController::class, 'stock'])->name('stock');
            Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
            Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
        });

        // Route untuk kelola
        Route::prefix('/kelola')->name('kelola.')->group(function() {
            Route::get('/create', [AkunController::class, 'create'])->name('create');
            Route::post('/store', [AkunController::class, 'store'])->name('store');
            Route::get('/', [AkunController::class, 'index'])->name('home');
            Route::get('{id}', [AkunController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [AkunController::class, 'update'])->name('update');
            Route::delete('/{id}', [AkunController::class, 'destroy'])->name('delete');
        });
    });
});
