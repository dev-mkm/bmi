<?php

use App\Http\Controllers\BMIController;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/bmi', [BMIController::class, 'getBMI']);
Route::post('/reduce', [BMIController::class, 'reduceBMI']);

require __DIR__.'/auth.php';
