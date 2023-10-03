<?php

use App\Exports\PembelianExport;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
//use App\http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;

Route::get('/home',[HomeController::class, 'index' ]);
Route::get('/profile',[HomeController::class, 'profile' ]);
Route::get('/contact',[HomeController::class, 'contact' ]);
Route::get('/faq',[HomeController::class, 'faq' ]);
Route::get('/dashboard',[HomeController::class, 'dashboard']);
//Route::resource('produk', ProdukController::class);
//Route::resource('pelanggan', PelangganController::class);
//Route::resource('pemasok', PemasokController::class);
Route::resource('barang', BarangController::class);
//Route::resource('pembelian', PembelianController::class);
Route::get('export-pembelian', [PembelianController::class, 'exportData'])->name('export-pembelian');
Route::post('history/import', [PembelianController::class, 'importData'])->name('import-pembelian');


//login
Route::get('/login',[UserController::class, 'index'])->name('login');
Route::post('/login/cek',[UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');

//route untuk yang sudah login
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('profile', [HomeController::class, 'profile']);
    Route::get('contact', [HomeController::class, 'contact']);
    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pemasok', PemasokController::class);

//route untuk admin
Route::group(['middleware' => ['cekUserLogin:1']], function(){
    Route::resource('produk', ProdukController::class);
});

//route untuk kasir
Route::group(['middleware' => ['cekUserLogin:2']], function(){
    Route::resource('pembelian', PembelianController::class);
    Route::get('history', [PembelianController::class, 'history']);
});

});

//latihan 2
//Route::get('/',[DashboardController::class, 'index' ]);
//Route::get('/',[DashboardController::class, 'blog' ]);

