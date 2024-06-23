<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts',PostController::class);
Route::get('posts/restore/{id}',[PostController::class,'restore'])->name('posts.restore');
Route::delete('posts/delete/{id}',[PostController::class,'delete'])->name('posts.delete');
