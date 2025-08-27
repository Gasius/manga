<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/create_post', [MainController::class, 'postCreate'])->name('main.post.create');

Route::post('/posts', [MainController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [MainController::class, 'delete'])->name('posts.delete');
Route::get('/posts/{post}', [MainController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [MainController::class, 'update'])->name('posts.update');

Route::get('/post/{post}',[PostController::class,'index'])->name('post.index');
Route::get('/read-chapter/{chapter}', [ChapterController::class, 'read'])->name('chapter.read');
