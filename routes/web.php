<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AssignUserRoleController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Doctor\DoctorsController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\Patient\PatientsController;
use App\Http\Controllers\ReceptionDashboardController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    /* entry-point */
    Route::middleware('role')
        ->get('/dashboard', fn() => dd(auth()->user()->role->name))
        ->name('dashboard');

    /* pacjent */
    Route::middleware('role:patient')
        ->prefix('patient')->name('patient.')->group(function () {
            Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');
        });

    /* lekarz */
    Route::middleware('role:doctor')
        ->prefix('doctor')->name('doctor.')->group(function () {
            Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
        });

    /* recepcjonista */
    Route::middleware('role:reception')
        ->prefix('reception')->name('reception.')->group(function () {
            Route::get('/dashboard', [ReceptionDashboardController::class, 'index'])->name('dashboard');
        });

    /* admin */
    Route::middleware('role:admin')
        ->prefix('admin')->name('admin.')->group(function () {

            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

            Route::prefix('users/{user}')->name('users.')->group(function () {
                Route::middleware('signed')
                    ->get('/doctors/create', [DoctorsController::class, 'create'])
                    ->name('doctors.create');

                Route::post('/doctors', [DoctorsController::class, 'store'])
                    ->name('doctors.store');
            });

            Route::middleware(['role:admin', 'signed'])
                ->get('/admin/users/{user}/role/{role}/assign', AssignUserRoleController::class)
                ->whereIn('role', ['admin', 'reception'])
                ->name('users.role.assign');
        });

    /* create/store pacjent – admin + reception */
    Route::middleware('role:admin,reception')
        ->prefix('patients')->name('patients.')->group(function () {
            Route::get('/create', [PatientsController::class, 'create'])->name('create');
            Route::post('/', [PatientsController::class, 'store'])->name('store');
        });
});


Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');
