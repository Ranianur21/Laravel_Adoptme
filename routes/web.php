<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewanController;

// Beri nama 'home' pada rute halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Beri nama 'kontak' pada rute kontak
Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');

// Beri nama 'hewan' pada rute hewan
Route::get('/hewan', function () {
    return view('user.hewan');
})->name('hewan');

Route::get('/hewan', [HewanController::class, 'index'])->name('hewan');

// Beri nama 'tentang' pada rute about
Route::get('/tentang', function () {
    return view('user.tentang');
})->name('tentang');

// Beri nama 'profil' pada rute profil
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

// Beri nama 'toko' pada rute toko
Route::get('/toko', function () {
    return view('toko');
})->name('toko');

// Beri nama 'panduan' pada rute panduan
Route::get('/panduan', function () {
    return view('panduan');
})->name('panduan');

// Beri nama 'login' pada rute ogin
Route::get('/login', function () {
    return view('login');
})->name('login');

// Beri nama 'logout' pada rute logout
Route::get('/logout', function () {
    return view('logout');
})->name('logout');