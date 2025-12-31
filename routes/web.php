<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER PAGES
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');

/**
 * BERITA (USER)
 */
Route::get('/berita', [PageController::class, 'berita'])->name('berita');

Route::get('/detail/berita/{slug}', [PageController::class, 'detberita'])
    ->name('detberita');

/**
 * GALERI
 */
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');

/**
 * KONTAK
 */
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

/**
 * TENTANG
 */
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    /**
     * DASHBOARD
     */
    Route::get('/', [PageController::class, 'admin'])->name('admin');

    /**
     * ADMIN BERITA (CRUD)
     * (tetap pakai POST supaya blade kamu tidak rusak)
     */
    Route::get('/berita', [BeritaController::class, 'index'])
        ->name('admin.berita');

    Route::post('/berita/store', [BeritaController::class, 'store'])
        ->name('admin.berita.store');

    Route::post('/berita/update', [BeritaController::class, 'update'])
        ->name('admin.berita.update');

    Route::post('/berita/delete', [BeritaController::class, 'destroy'])
        ->name('admin.berita.delete');

    /**
     * ADMIN DETAIL BERITA (DINAMIS – PAKAI SLUG)
     */
    Route::get('/detail/berita/{slug}', [PageController::class, 'Adetberita'])
        ->name('admin.berita.detail');

    /**
     * ADMIN GALERI
     */
    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('admin.galeri');

    Route::post('/galeri', [GaleriController::class, 'store'])
        ->name('galeri.store');

    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])
        ->name('galeri.update');

    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])
        ->name('galeri.destroy');

    /**
     * ADMIN KONTAK
     */
    Route::get('/kontak', [AdminController::class, 'kontak'])
        ->name('admin.kontak');

    Route::delete('/kontak/{id}', [AdminController::class, 'kontakHapus'])
        ->name('admin.kontak.hapus');

    Route::delete('/kontak', [AdminController::class, 'kontakHapusBanyak'])
        ->name('admin.kontak.hapus.banyak');

    Route::patch('/kontak/{id}/dibaca', [AdminController::class, 'kontakTandaiDibaca'])
        ->name('admin.kontak.dibaca');

    /**
     * ADMIN TENTANG
     */
    Route::get('/tentang', [PageController::class, 'adminTentang'])
        ->name('admin.tentang');

    Route::post('/tentang', [TentangController::class, 'update'])
        ->name('admin.tentang.update');
});


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [PageController::class, 'login'])
    ->name('login');
