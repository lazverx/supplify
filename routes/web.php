<?php

// use App\Http\Controllers\CartController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogTransaksiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\ValidasiController;
use App\Http\Controllers\LandingpageController;
// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Penjual\ProdukController as PenjualProdukController;
use App\Http\Controllers\Penjual\TransaksiController as TransaksiPenjualController;

use App\Http\Controllers\Pembeli\MarketplaceController;
use App\Http\Controllers\Pembeli\TransaksiController as TransaksiPembeliController;
use App\Http\Controllers\Pembeli\TransaksiSimulasiController;
use App\Http\Controllers\Pembeli\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pembeli\ProfileController as PembeliProfileController;
use App\Http\Controllers\Penjual\ProfileController as PenjualProfileController;


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

Route::get('/', [LandingpageController::class, 'index'])->name('landing');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    // Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen pengguna
    Route::get('/users/export-pdf', [UserController::class, 'exportIndexPdf'])->name('users.exportIndexPdf');
    
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

    // Manajemen Log Transaksi
    Route::get('/transaksi/log', [LogTransaksiController::class, 'index'])->name('transaksi.log');
    Route::get('/transaksi/export-pdf', [LogTransaksiController::class, 'exportPdf'])->name('log-transaksi.export-pdf');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'penjual'])->prefix('penjual')->name('penjual.')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('penjual.dashboard'))->name('dashboard');

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
    Route::get('/riwayat-transaksi', [TransaksiPenjualController::class, 'index'])->name('transaksi.index');
    Route::get('/riwayat-transaksi/export/pdf', [TransaksiPenjualController::class, 'exportPdf'])->name('transaksi.export.pdf');


    Route::get('/profile', [PenjualProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [PenjualProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [PenjualProfileController::class, 'update'])->name('profile.update');
});

// Route pembeli
Route::middleware(['auth', 'pembeli'])->prefix('pembeli')->name('pembeli.')->group(function () {
    Route::get('/dashboard', fn() => view('pembeli.dashboard'))->name('dashboard');

    Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
    Route::get('/marketplace/produk/{produk}', [MarketplaceController::class, 'show'])->name('marketplace.show');

    // Dari marketplace → buat transaksi → redirect checkout
    Route::get('/transaksi/bayar/{produk}', [TransaksiSimulasiController::class, 'bayar'])->name('transaksi.bayar');

    Route::get('/transaksi', [TransaksiPembeliController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/checkout/{produk}', [TransaksiSimulasiController::class, 'checkout'])->name('transaksi.checkout');

    Route::post('/transaksi/bayar', [TransaksiSimulasiController::class, 'bayar'])->name('transaksi.bayar');


    // Simulasi update status
    Route::get('/transaksi/status/{transaksi}', [TransaksiSimulasiController::class, 'status'])->name('transaksi.status');

    // Route untuk cart produk
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/checkout', [CartController::class, 'cartCheckout'])->name('index.cartCheckout');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/profile', [PembeliProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [PembeliProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [PembeliProfileController::class, 'update'])->name('profile.update');
});




require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/auth.php';
