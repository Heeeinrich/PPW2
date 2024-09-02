<?php

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

Route::get('/blog', function () {
    return view('blog', [
        "name" => "Heinrich Radhitya"
    ] );
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', [logincontroller::class, 'index']);
