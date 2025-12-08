<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/riwayat', function () {
    return view('riwayat');
});

// Route::get('/', fn() => redirect()->route('dashboard'));

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::prefix('product')->name('product.')->group(function () {
//     Route::get('/', fn() => view('product.index'))->name('index');
// });

// Route::get('/transaksi-baru', fn() => view('transaksi.baru'))->name('transaksi.baru');
// Route::get('/riwayat', fn() => view('transaksi.riwayat'))->name('transaksi.riwayat');

