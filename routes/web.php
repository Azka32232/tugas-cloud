<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/edit', [ProfileController::class, 'uploadPhoto'])->name('profile.upload');

require __DIR__.'/auth.php';
