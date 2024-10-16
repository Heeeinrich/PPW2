<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about', [
        "name" => "Heinrich Radhitya",
        "email" => "heinrichraditya@gmail.com"
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/login', [logincontroller::class, 'index']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

