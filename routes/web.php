<?php

use App\Http\Controllers\MainController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/create_post', [MainController::class, 'postCreate'])->name('main.post.create');
// Добавьте новый маршрут для сохранения поста
Route::post('/posts', [MainController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [MainController::class, 'delete'])->name('posts.delete');

