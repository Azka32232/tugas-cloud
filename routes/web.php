<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
*/
Route::middleware(['auth'])->group(function () {
    // Route untuk menampilkan profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Route untuk mengedit profile (form edit)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Route untuk update profile (submit form edit)
    Route::post('/profile/show', [ProfileController::class, 'update'])->name('profile.show');
});

require __DIR__.'/auth.php';
