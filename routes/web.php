<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::middleware(['auth', 'role:company'])->group(function () {
    Route::view('/firma/dashboard', 'livewire.firma.dashboard')->name('firma.dashboard');
});

Route::middleware(['auth', 'role:citizen'])->group(function () {
    Route::view('/vatandas/dashboard', 'vatandas.dashboard')->name('vatandas.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
