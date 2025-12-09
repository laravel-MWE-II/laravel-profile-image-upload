<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Guest routes (register, login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Authenticated routes (profile, upload, logout)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// home → redirect to login (optional)
Route::get('/', function () {
    return redirect()->route('login');
});
