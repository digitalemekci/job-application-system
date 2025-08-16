<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::redirect('/', '/login');

require __DIR__.'/auth.php';
