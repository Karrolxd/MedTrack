<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
   $user = auth()->user();

   if ($user->hasRole('doctor')) {
       return view('doctor.dashboard');
   } elseif ($user->hasRole('patient')) {
       return view('patient.dashboard');
   } elseif ($user->hasRole('admin')) {
       return view('admin.dashboard');
   } elseif ($user->hasRole('reception')) {
       return view('reception.dashboard');
   }

   return view('welcome');
})->middleware(['auth'])->name('dashboard');

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');
