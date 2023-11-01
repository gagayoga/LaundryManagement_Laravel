<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailtransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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
    return view('loadingscreen');
});

// route user dalam login register, dan logout
Route::controller(UserController::class)->group(function () {
    // middleware untuk memeriksa jika sudah login maka tidak bisa menuju halaman sign-in
    Route::get('sign-up', 'register')->name('register')->middleware('loginverified');
    Route::post('sign-up', 'registerSimpan')->name('register.simpan')->middleware('loginverified');

    Route::get('sign-in', 'login')->name('login')->middleware('loginverified');
    Route::post('sign-in', 'loginAksi')->name('login.aksi')->middleware('loginverified');

    Route::get('sign-out', 'logout')->middleware('auth')->name('logout');
});

// route dashboard dan middleare pembatasan hak akses
Route::middleware(['web', 'auth'])->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        // route untuk halaman dashboard
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('search-menu', [DashboardController::class, 'searchmenu'])->name('searchmenu');
        Route::post('update', [DashboardController::class, 'update'])->name('profile.update');
        Route::post('update-password', [DashboardController::class, 'updatepassword'])->name('profile.update.password');

        // route untuk crud pengguna/user
        Route::controller(PenggunaController::class)->prefix('pengguna')->group(function () {
            Route::get('', 'index')->name('pengguna');
            Route::get('data-terbaru', [PenggunaController::class, 'terbaru'])->name('pengguna.terbaru');
            Route::get('status-online', [PenggunaController::class, 'status'])->name('pengguna.status');
            Route::get('tambah', [PenggunaController::class, 'tambah'])->name('pengguna.tambah');
            Route::get('search', [PenggunaController::class, 'search'])->name('pengguna.cari');
            Route::post('tambah', [PenggunaController::class, 'simpan'])->name('pengguna.tambah.simpan');
            Route::get('update/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
            Route::post('update/{id}', [PenggunaController::class, 'update'])->name('pengguna.tambah.update');
            Route::get('delete/{id}', [PenggunaController::class, 'hapus'])->name('pengguna.hapus');
        });

        // route untuk halaman outlet
        Route::controller(OutletController::class)->prefix('outlet')->group(function () {
            Route::get('', 'index')->name('outlet');
            Route::get('data-terbaru', [OutletController::class, 'terbaru'])->name('outlet.terbaru');
            Route::get('tambah', [OutletController::class, 'tambah'])->name('outlet.tambah');
            Route::get('search', [OutletController::class, 'search'])->name('outlet.cari');
            Route::post('tambah', [OutletController::class, 'simpan'])->name('outlet.tambah.simpan');
            Route::get('update/{id}', [OutletController::class, 'edit'])->name('outlet.edit');
            Route::post('update/{id}', [OutletController::class, 'update'])->name('outlet.tambah.update');
            Route::get('delete/{id}', [OutletController::class, 'hapus'])->name('outlet.hapus');
        });

        // route untuk crud paket
        Route::controller(PaketController::class)->prefix('paket')->group(function () {
            Route::get('', 'index')->name('paket');
            Route::get('data-terbaru', [PaketController::class, 'terbaru'])->name('paket.terbaru');
            Route::get('search', [PaketController::class, 'search'])->name('paket.cari');
            Route::post('tambah', [PaketController::class, 'simpan'])->name('paket.tambah.simpan');
            Route::post('update/{id}', [PaketController::class, 'update'])->name('paket.tambah.update');
            Route::get('delete/{id}', [PaketController::class, 'hapus'])->name('paket.hapus');
        });

        // route untuk crud member
        Route::controller(MemberController::class)->prefix('member')->group(function () {
            Route::get('', 'index')->name('member');
            Route::get('tambah', [MemberController::class, 'tambah'])->name('member.tambah');
            Route::post('tambah', [MemberController::class, 'simpan'])->name('member.tambah.simpan');
            Route::get('data-terbaru', [MemberController::class, 'terbaru'])->name('member.terbaru');
            Route::get('search', [MemberController::class, 'search'])->name('member.cari');
            // Route::post('tambah', [MemberController::class, 'simpan'])->name('paket.tambah.simpan');
            Route::post('update/{id}', [MemberController::class, 'update'])->name('member.tambah.update');
            Route::get('delete/{id}', [MemberController::class, 'hapus'])->name('member.hapus');
        });

        // route untuk crud transaksi
        Route::controller(TransaksiController::class)->prefix('transaksi')->group(function () {
            Route::get('', 'index')->name('transaksi');
            Route::get('semua-data', [TransaksiController::class, 'semua'])->name('transaksi.semua');
            Route::get('tambah', [TransaksiController::class, 'tambah'])->name('transaksi.tambah');
            Route::get('search', [TransaksiController::class, 'search'])->name('transaksi.cari');
            Route::post('tambah', [TransaksiController::class, 'simpan'])->name('transaksi.tambah.simpan');
            Route::get('data-terbaru', [TransaksiController::class, 'terbaru'])->name('transaksi.terbaru');
            Route::get('update/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
            Route::post('update/{id}', [TransaksiController::class, 'update'])->name('transaksi.tambah.update');
            Route::get('delete/{id}', [TransaksiController::class, 'hapus'])->name('transaksi.hapus');
        });

        // route untuk crud member
        Route::controller(DetailtransaksiController::class)->prefix('laporan')->group(function () {
            Route::get('', 'index')->name('laporan');
            Route::get('search', [DetailtransaksiController::class, 'search'])->name('laporan.cari');
            Route::get('filter/{bulan}', [DetailtransaksiController::class, 'filter'])->name('laporan.filter');
            Route::get('data-terbaru', [DetailtransaksiController::class, 'terbaru'])->name('laporan.terbaru');
            Route::get('semua-data', [DetailtransaksiController::class, 'semua'])->name('laporan.semua');
            Route::get('/generate-laporan', [DetailtransaksiController::class, 'generatelaporan'])->name('laporan.cetak');
        });
    });

    Route::get('login', function () {
        return view('auth/login');
    })->name('sign-in');

    Route::get('register', function () {
        return view('auth/login');
    })->name('sign-up');
});
