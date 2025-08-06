<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController as AdminProdukController;
use App\Http\Controllers\Penjual\ProdukController as PenjualProdukController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\Pembeli\MarketplaceController;
use App\Http\Controllers\Pembeli\TransaksiController as TransaksiPembeliController;
use App\Http\Controllers\Penjual\TransaksiController as TransaksiPenjualController;
use App\Http\Controllers\Pembeli\TransaksiSimulasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    // Manajemen pengguna
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Manajemen produk
    Route::get('/produk', [AdminProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}', [AdminProdukController::class, 'show'])->name('produk.show');



    // Validasi produk
    Route::post('/produk/{id}/approve', [ValidasiController::class, 'approve'])->name('validasi.approve');
    Route::post('/produk/{id}/reject', [ValidasiController::class, 'reject'])->name('validasi.reject');
    Route::get('/produk-validasi/log', [ValidasiController::class, 'log'])->name('validasi.log');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'penjual'])->prefix('penjual')->name('penjual.')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn () => view('penjual.dashboard'))->name('dashboard');

    // Produk - Pengajuan & Manajemen Produk
    Route::get('/produk', [PenjualProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [PenjualProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [PenjualProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [PenjualProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [PenjualProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [PenjualProdukController::class, 'destroy'])->name('produk.destroy');

    // Produk yang disetujui / ditolak oleh admin
    Route::get('/produk/disetujui', [PenjualProdukController::class, 'disetujui'])->name('produk.disetujui');
    Route::get('/produk/ditolak', [PenjualProdukController::class, 'ditolak'])->name('produk.ditolak');

    Route::get('/produk/log', [PenjualProdukController::class, 'log'])->name('produk.log');

    // Transaksi - Riwayat Penjualan Produk
    Route::get('/transaksi', [TransaksiPenjualController::class, 'index'])->name('transaksi.index');
});

// Route pembeli
Route::middleware(['auth' , 'pembeli'])->prefix('pembeli')->name('pembeli.')->group(function () {
    Route::get('/dashboard', fn () => view('pembeli.dashboard'))->name('dashboard');

    Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');

    Route::get('/marketplace/produk/{id}', [MarketplaceController::class, 'show'])->name('marketplace.show');

    Route::get('/transaksi/checkout/{produk}', [TransaksiPembeliController::class, 'checkout'])->name('transaksi.checkout');
    Route::get('/transaksi/bayar/{produk}', [TransaksiPembeliController::class, 'bayar'])->name('transaksi.bayar');


    Route::get('/transaksi',[TransaksiPembeliController::class, 'index'])->name('transaksi.index');

    // Simulasi Transaksi
    Route::post('/transaksi/{id}/bayar', [TransaksiSimulasiController::class, 'bayar'])->name('transaksi.bayar');
    Route::get('/transaksi/{id}/status', [TransaksiSimulasiController::class, 'status'])->name('transaksi.status');
});



require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/auth.php';
