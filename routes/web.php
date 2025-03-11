<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\SepedaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [GuestController::class, 'index'])->name('guest');

Route::middleware('guest')->group(function () {

    Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [BerandaController::class, 'index'])->name('dashboard');
        
        // Route::resource('peminjam', PeminjamController::class);
        Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
        Route::get('/peminjam/create', [PeminjamController::class, 'create'])->name('peminjam.create');
        Route::post('/peminjam/store', [PeminjamController::class, 'store'])->name('peminjam.store');
        Route::get('/peminjam/{id}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
        Route::put('/peminjam/{id}', [PeminjamController::class, 'update'])->name('peminjam.update');
        Route::delete('/peminjam/{id}', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');
        
        // Route::resource('sepeda', SepedaController::class);
        Route::get('/sepeda', [SepedaController::class, 'index'])->name('sepeda.index');
        Route::get('/sepeda/create', [SepedaController::class, 'create'])->name('sepeda.create');
        Route::post('/sepeda/store', [SepedaController::class, 'store'])->name('sepeda.store');
        Route::get('/sepeda/{id}/edit', [SepedaController::class, 'edit'])->name('sepeda.edit');
        Route::put('/sepeda/{id}', [SepedaController::class, 'update'])->name('sepeda.update');
        Route::delete('/sepeda/{id}', [SepedaController::class, 'destroy'])->name('sepeda.destroy');
        
        // Route::resource('transaksi', TransaksiController::class);
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
        Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
        Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

});