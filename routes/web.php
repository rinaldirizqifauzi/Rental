<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpesikasiController;
use App\Http\Controllers\KelengkapanController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//


//Website

Route::get('/', function(){
    return view('welcome');
});

Route::get('/beranda', [WebsiteController::class, 'beranda'])->name('beranda')->middleware('auth');


Route::prefix('/dashboard')->middleware('auth', 'ceklevel:admin', 'cekadmin:active')->group(function () {
    // Dashboard
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/data-master',[DashboardController::class, 'dataMaster'])->name('dashboard.data-master');
    Route::get('/konfirmasi', [DashboardController::class, 'konfirmasi'])->name('konfirmasi.index');
    // Spesifikasi
    Route::get('/select/tipe', [SpesikasiController::class, 'selectTipe'])->name('tipe.select');
    Route::get('/select/warna', [SpesikasiController::class, 'selectWarna'])->name('warna.select');
    Route::get('/spesifikasi',[SpesikasiController::class, 'index'])->name('spesifikasi.index');
    Route::post('/spesifikasi', [SpesikasiController::class, 'store'])->name('spesifikasi.store');
    Route::get('/spesifikasi/{nama}/edit', [SpesikasiController::class, 'edit'])->name('spesifikasi.edit');
    Route::put('/spesifikasi/{nama}/update', [SpesikasiController::class, 'update'])->name('spesifikasi.update');
    Route::get('/spesifikasi/{nama}', [SpesikasiController::class, 'destroy'])->name('spesifikasi.destroy');

    // Tipe
    Route::get('/select/warna', [TipeController::class, 'selectWarna'])->name('warna.select');
    Route::get('/tipe',[TipeController::class, 'index'])->name('tipe.index');
    Route::post('/tipe', [TipeController::class, 'store'])->name('tipe.store');
    Route::get('/tipe/{kode_tipe}/edit', [TipeController::class, 'edit'])->name('tipe.edit');
    Route::put('/tipe/{kode_tipe}/update', [TipeController::class, 'update'])->name('tipe.update');
    Route::get('/tipe/{kode_tipe}', [TipeController::class, 'destroy'])->name('tipe.destroy');

    // Warna
    Route::get('/warna',[WarnaController::class, 'index'])->name('warna.index');
    Route::post('/warna', [WarnaController::class, 'store'])->name('warna.store');
    Route::get('/warna/{id}/edit', [WarnaController::class, 'edit'])->name('warna.edit');
    Route::put('/warna/{id}/update', [WarnaController::class, 'update'])->name('warna.update');
    Route::get('/warna/{id}', [WarnaController::class, 'destroy'])->name('warna.destroy');

    // Mesin
    Route::get('/mesin',[MesinController::class, 'index'])->name('mesin.index');
    Route::post('/mesin', [MesinController::class, 'store'])->name('mesin.store');
    Route::get('/mesin/{nama}/edit', [MesinController::class, 'edit'])->name('mesin.edit');
    Route::put('/mesin/{nama}/update', [MesinController::class, 'update'])->name('mesin.update');
    Route::get('/mesin/{nama}', [MesinController::class, 'destroy'])->name('mesin.destroy');

    // Kelengkapan
    Route::get('/select/kelengkapan', [KelengkapanController::class, 'selectKelengkapan'])->name('kelengkapan.select');
    Route::get('/kelengkapan',[KelengkapanController::class, 'index'])->name('kelengkapan.index');
    Route::post('/kelengkapan', [KelengkapanController::class, 'store'])->name('kelengkapan.store');
    Route::get('/kelengkapan/{kode}/edit', [KelengkapanController::class, 'edit'])->name('kelengkapan.edit');
    Route::put('/kelengkapan/{kode}/update', [KelengkapanController::class, 'update'])->name('kelengkapan.update');
    Route::get('/kelengkapan/{kode}', [KelengkapanController::class, 'destroy'])->name('kelengkapan.destroy');

    // Laporan
    Route::get('/laporan',[ReportController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [ReportController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [ReportController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}/update', [ReportController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/{id}', [ReportController::class, 'destroy'])->name('laporan.destroy');
});


// Rental
Route::group(['prefix' => '/rental'], function(){
    Route::get('/select/mesin', [RentalController::class, 'selectMesin'])->name('mesin.select');
    Route::get('/select/tipe', [RentalController::class, 'selectTipe'])->name('tipe.select');
    Route::get('/select/warna', [RentalController::class, 'selectWarna'])->name('warna.select');
    Route::get('/select/spesifikasi', [RentalController::class, 'selectSpesifikasi'])->name('spesifikasi.select');
    Route::get('/', [RentalController::class, 'index'])->name('rental.index')->middleware('auth','cekadmin:active');
    Route::post('/rental', [RentalController::class, 'store'])->name('rental.store')->middleware('auth','cekadmin:active');
    Route::get('/rental/{kode_mobil}/edit', [RentalController::class, 'edit'])->name('rental.edit')->middleware('auth','cekadmin:active');
    Route::put('/rental/{kode_mobil}/update', [RentalController::class, 'update'])->name('rental.update')->middleware('auth','cekadmin:active');
    Route::get('/{kode_mobil}', [RentalController::class, 'destroy'])->name('rental.destroy')->middleware('auth','cekadmin:active');
    Route::get('/rental/detail/{kode_mobil}', [RentalController::class, 'detail'])->name('rental.detail')->middleware('auth','cekadmin:active');
});

// Transaksi
Route::group(['prefix' => '/transaksi'], function(){
    Route::post('/', [TransaksiController::class, 'storeTransaksi'])->name('store.transaksi')->middleware('auth', 'ceklevel:pelanggan', 'cekpelanggan:active');
    Route::get('/detail/{id}', [TransaksiController::class, 'detailTransaksi'])->name('detail.transaksi')->middleware('auth', 'ceklevel:admin', 'cekadmin:active');
    Route::put('/konfirmasi/{id}', [TransaksiController::class, 'konfirmasiTransaksi'])->name('confirm.transaksi')->middleware('auth', 'ceklevel:admin', 'cekadmin:active');
    Route::put('/kembali/{id}', [TransaksiController::class, 'kembaliTransaksi'])->name('kembali.transaksi')->middleware('auth', 'ceklevel:admin', 'cekadmin:active');
});

// Pelanggan Active
    Route::get('/profil/{id}',[ UserController::class, 'createProfil'])->name('create.profil');
    Route::post('/profil/buat/{id}', [ UserController::class, 'storeProfil'])->name('store.profil');

    Route::prefix('/')->middleware('auth', 'ceklevel:pelanggan', 'cekpelanggan:active')->group(function(){
        Route::get('/profil/show/{user}',[ UserController::class, 'showProfil'])->name('show.profil');
        Route::get('/profil/edit/{user}',[ UserController::class, 'editProfil'])->name('edit.profil');
        Route::put('/profil/update/{user}',[ UserController::class, 'updateProfil'])->name('update.profil');
        Route::get('/homepage',[ WebsiteController::class, 'showHomepage'])->name('homepage');
        Route::get('/product/detail/{kode_mobil}',[ WebsiteController::class, 'showDetailProduct'])->name('product.detail');
    });

    Route::prefix('/pelanggan')->group(function(){
        // Pelanggan
        Route::get('/', [PelangganController::class, 'showUser'])->name('user.index')->middleware('auth', 'cekadmin:active');
        Route::get('/detail/{id}', [PelangganController::class, 'detailUser'])->name('user.detail')->middleware('auth','cekadmin:active');
        Route::get('/hapus/{id}', [PelangganController::class, 'destroyUser'])->name('user.destroy')->middleware('auth','cekadmin:active');
    });

    Route::prefix('/admin')->middleware('auth', 'ceklevel:admin')->group(function(){
    // Admin
    Route::get('/', [AdminController::class, 'showAdmin'])->name('admin.index')->middleware('auth','cekadmin:active');
    Route::get('/buat', [AdminController::class, 'createAdmin'])->name('admin.create')->middleware('auth','cekadmin:active');
    Route::post('/', [AdminController::class, 'storeAdmin'])->name('admin.store')->middleware('auth', 'cekadmin:active');
    Route::get('/hapus/{id}', [AdminController::class, 'destroyAdmin'])->name('admin.destroy')->middleware('auth','cekadmin:active');


    // Detail Admin
    Route::get('/profil/{user}', [AdminController::class, 'showProfilAdmin'])->name('admin.show_profil')->middleware('auth', 'cekadmin:active');
    Route::post('/profil', [AdminController::class, 'storeProfilAdmin'])->name('admin.store_profil')->middleware('auth','ceklevel:admin');
    Route::get('/buat/profil', [AdminController::class, 'createProfilAdmin'])->name('admin.create_profil')->middleware('auth','ceklevel:admin');
    Route::get('/profil/edit/{user}',[ AdminController::class, 'editProfilAdmin'])->name('admin.edit_profil')->middleware('auth', 'cekadmin:active');
    Route::put('/profil/update/{user}',[ AdminController::class, 'updateProfileAdmin'])->name('admin.update_profil')->middleware('auth', 'cekadmin:active');

});

//   // Admin


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
