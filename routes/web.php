<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

//route resource
Route::resource('/posts', PostController::class)->names([
    'index' => 'posts.indek',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
    'edit' => 'posts.edit',
    'update' => 'posts.update',
    'secret' => 'posts.secret',
    '' => 'posts.destroyy',
]);

Route::get('/secret', function(){
    return view('posts.secret');
}
)->name('secret');


