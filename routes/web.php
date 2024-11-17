<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// About route
Route::get('/about', function () {
    return view('about', [
        "name" => "Heinrich Radhitya",
        "email" => "heinrichraditya@gmail.com"
    ]);
})->name('about');

// Contact route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Login routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'authenticate'])->name('authenticate');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// Buku routes
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

// Authenticated routes for buku and gallery (using 'auth' middleware)
Route::middleware('auth')->group(function () {
    // Buku CRUD routes
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');


});

// Register and dashboard routes
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::post('/logout', 'logout')->name('logout');
});

// Send-email routes
Route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email2', [SendEmailController::class, 'store'])->name('post-email2');

// Gallery resource routes
Route::resource('/buku/gallery', GalleryController::class);

Route::prefix('gallery')->name('gallery.')->middleware('auth')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/create', [GalleryController::class, 'create'])->name('create');
    Route::post('/', [GalleryController::class, 'store'])->name('store');
    Route::get('/{id}', [GalleryController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [GalleryController::class, 'update'])->name('update');
    Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('destroy');
});
