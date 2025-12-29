<?php

use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// UI Design Tasty Food
Route::get('/',[PageController::class, 'home'])->name('home');
Route::get('/berita',[PageController::class, 'berita'])->name('berita');
Route::get('/galeri',[PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak',[PageController::class, 'kontak'])->name('kontak');
Route::get('/tentang',[PageController::class, 'tentang'])->name('tentang');

Route::post('/kontak', [KontakController::class, 'store']);


// Admin Tasty Food
Route::get('/admin', [PageController::class, 'admin'])->name('admin');
Route::get('/admin/berita', [PageController::class, 'adminBerita'])->name('admin.berita');
Route::get('/admin/galeri', [PageController::class, 'adminGaleri'])->name('admin.galeri');
Route::get('/admin/kontak', [PageController::class, 'adminKontak'])->name('admin.kontak');
Route::get('/admin/tentang', [PageController::class, 'adminTentang'])->name('admin.tentang');