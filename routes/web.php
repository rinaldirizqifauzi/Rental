<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpesikasiController;
use App\Http\Controllers\KelengkapanController;
use App\Http\Controllers\MesinController;

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
    Route::get('profil/{id}',[ UserController::class, 'createProfil'])->name('create.profil');
    Route::post('profil/buat/{id}', [ UserController::class, 'storeProfil'])->name('store.profil');


    Route::prefix('/')->middleware('auth', 'ceklevel:pelanggan')->group(function(){
        Route::get('/profil/show/{user}',[ UserController::class, 'showProfil'])->name('show.profil');
        Route::get('/profil/edit/{user}',[ UserController::class, 'editProfil'])->name('edit.profil');
        Route::put('/profil/update/{user}',[ UserController::class, 'updateProfil'])->name('update.profil');
        Route::get('/homepage',[ WebsiteController::class, 'showHomepage'])->name('homepage');
    });


Route::prefix('/dashboard')->middleware('auth', 'ceklevel:admin')->group(function () {
 // Dashboard
 Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
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
});






// Rental
Route::group(['prefix' => '/rental'], function(){
    Route::get('/select/mesin', [RentalController::class, 'selectMesin'])->name('mesin.select');
    Route::get('/select/tipe', [RentalController::class, 'selectTipe'])->name('tipe.select');
    Route::get('/select/warna', [RentalController::class, 'selectWarna'])->name('warna.select');
    Route::get('/select/spesifikasi', [RentalController::class, 'selectSpesifikasi'])->name('spesifikasi.select');
    Route::get('/', [RentalController::class, 'index'])->name('rental.index');
    Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');
    Route::get('/rental/{kode_mobil}/edit', [RentalController::class, 'edit'])->name('rental.edit');
    Route::put('/rental/{kode_mobil}/update', [RentalController::class, 'update'])->name('rental.update');
    Route::get('/{kode_mobil}', [RentalController::class, 'destroy'])->name('rental.destroy');
    Route::get('/rental/detail/{kode_mobil}', [RentalController::class, 'detail'])->name('rental.detail');
});





Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
