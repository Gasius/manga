<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::inertia('/', 'Index');

});

Route::prefix('/auth')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AuthController::class, 'show'])->name('auth.login');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
    });
});

