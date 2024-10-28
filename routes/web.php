<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;


// Rute untuk halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Rute untuk halaman about
Route::get('/about', function () {
    return view('about', [
        "name" => "Heinrich Radhitya",
        "email" => "heinrichraditya@gmail.com"
    ]);
})->name('about');

// Rute untuk halaman contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Rute untuk login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'authenticate'])->name('authenticate');

// Rute untuk blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// Rute untuk buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

// Rute untuk register dan dashboard
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email2', [SendEmailController::class, 'store'])->name('post-email2');

