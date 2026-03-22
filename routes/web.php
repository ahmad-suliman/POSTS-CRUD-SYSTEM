<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post_id}',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/{post_id}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post_id}',[PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post_id}',[PostController::class,'destroy'])->name('posts.destroy');
