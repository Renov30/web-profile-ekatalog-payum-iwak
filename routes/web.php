<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/katalog', [FrontController::class, 'katalog'])->name('front.katalog');
Route::get('/katalog/detail-produk', [FrontController::class, 'detailProduk'])->name('front.detailProduk');
Route::get('/pesan-whatsapp', [FrontController::class, 'pesanWhatsapp'])->name('front.pesanWhatsapp');
// Route::get('/data', [FrontController::class, 'data'])->name('front.data');
// Route::get('/data/detail-produk/{produk:slug}', [FrontController::class, 'detail'])->name('front.detail');
// Route::get('/peta', [FrontController::class, 'peta'])->name('front.peta');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
