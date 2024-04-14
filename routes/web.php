<?php

use App\Http\Controllers\AdminGudang\ControllerAdmin;
use App\Http\Controllers\AdminGudang\ControllerBarangKeluar;
use App\Http\Controllers\AdminGudang\ControllerBarangMasuk;
use App\Http\Controllers\AdminGudang\ControllerDataBarang;
use App\Http\Controllers\AdminGudang\ControllerKelolaGudang;
use App\Http\Controllers\AdminGudang\ControllerKelolaSupplier;
use App\Http\Controllers\AdminGudang\ControllerKelolaUser;
use App\Http\Controllers\AdminGudang\ControllerPersediaanBarang;
use App\Http\Controllers\Authenticate\ControllerAuth;
use Illuminate\Support\Facades\Route;

Route::get('/home', [ControllerAuth::class, 'home'])->name('home');
Route::middleware('guest')->group(function () {
    Route::get('/', [ControllerAuth::class, 'index'])->name('login');
    Route::get('/login', [ControllerAuth::class, 'index'])->name('login');
    Route::post('/login', [ControllerAuth::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/logout', [ControllerAuth::class,'logout'])->name('logout');
    // Admin Gudang
    Route::middleware('akses:Admin')->name('admingudang')->prefix('/admingudang')->group(function () {
        Route::get('/dashboard',[ControllerAdmin::class, 'index'])->name('.dashboard');
        Route::get('/kelola-user',[ControllerKelolaUser::class, 'index'])->name('.kelola.user');
        // kelolasupplier
        Route::get('/kelola-supplier',[ControllerKelolaSupplier::class, 'index'])->name('.kelola.supplier');
        Route::post('/kelola-supplier/tambah',[ControllerKelolaSupplier::class, 'simpan'])->name('.simpan.kelola.supplier');
        Route::get('/kelola-supplier/tambah',[ControllerKelolaSupplier::class, 'tambah'])->name('.tambah.kelola.supplier');
        // databarang
        Route::get('/data-barang',[ControllerDataBarang::class, 'index'])->name('.data.barang');
        Route::get('/data-barang/detail/{id}',[ControllerDataBarang::class, 'detail'])->name('.detail.barang');
        Route::get('/data-barang-download-qrcode/{kode_barang}',[ControllerDataBarang::class, 'downloadQrCode'])->name('.data.barang.download.qrcode');
        Route::get('/data-barang/tambah',[ControllerDataBarang::class, 'tambah'])->name('.tambah.data.barang');
        Route::post('/data-barang/tambah',[ControllerDataBarang::class, 'simpan'])->name('.simpan.data.barang');
        // barangmasuk
        Route::get('/barang-masuk',[ControllerBarangMasuk::class, 'index'])->name('.barang.masuk');
        Route::get('/barang-masuk/tambah',[ControllerBarangMasuk::class, 'tambah'])->name('.tambah.barang.masuk');
        Route::post('/barang-masuk/tambah',[ControllerBarangMasuk::class, 'simpan'])->name('.simpan.barang.masuk');
        // barangkeluar
        Route::get('/barang-keluar',[ControllerBarangKeluar::class, 'index'])->name('.barang.keluar');
        Route::get('/barang-keluar/tambah',[ControllerBarangKeluar::class, 'tambah'])->name('.tambah.barang.keluar');
        Route::post('/barang-keluar/tambah',[ControllerBarangKeluar::class, 'simpan'])->name('.simpan.barang.keluar');
        // persediaanbarang
        Route::get('/persediaan-barang',[ControllerPersediaanBarang::class, 'index'])->name('.persediaan.barang');
        Route::get('/persediaan-barang/tambah',[ControllerPersediaanBarang::class, 'tambah'])->name('.tambah.persediaan.barang');
        Route::post('/persediaan-barang/tambah',[ControllerPersediaanBarang::class, 'simpan'])->name('.simpan.persediaan.barang');
         // kelolagudang
         Route::get('/kelola-gudang',[ControllerKelolaGudang::class, 'index'])->name('.kelola.gudang');
         Route::post('/kelola-gudang/tambah',[ControllerKelolaGudang::class, 'simpan'])->name('.simpan.kelola.gudang');
         Route::get('/kelola-gudang/tambah',[ControllerKelolaGudang::class, 'tambah'])->name('.tambah.kelola.gudang');

    });
    // Admin Gudang

    // Staff Penjualan
    Route::middleware('akses:Penjualan')->name('staffpenjualan')->prefix('/staffpenjualan')->group(function () {
    });
    // Staff Penjualan

    // Manager Gudang
    Route::middleware('akses:Manager')->name('managergudang')->prefix('/managergudang')->group(function () {
    });
    // Manager Gudang
});
