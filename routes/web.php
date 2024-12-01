<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;

Route::get('/', function () {
    return view('welcome');  // Pagrindinis puslapis
});

// Kliento posistemis
Route::prefix('client')->name('client.')->group(function() {
    Route::get('conferences', [ClientController::class, 'index'])->name('conferences');  // Klientų konferencijų sąrašas
    Route::get('conference/{id}', [ClientController::class, 'show'])->name('conference');  // Viena konferencija
    Route::post('register/{id}', [ClientController::class, 'register'])->name('register');  // Registracija į konferenciją
});

// Darbuotojo posistemis
Route::prefix('employee')->name('employee.')->group(function() {
    Route::get('conferences', [EmployeeController::class, 'index'])->name('conferences');  // Darbuotojų konferencijų sąrašas
    Route::get('conference/{id}', [EmployeeController::class, 'show'])->name('conference');  // Viena konferencija
    Route::get('/', [EmployeeController::class, 'index'])->name('index');  // Darbuotojo pagrindinis puslapis
});

// Administratoriaus posistemis
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');  // Administratorius pagrindinis puslapis
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');  // Administratorius prietaisų skydelis
    Route::resource('users', UserController::class);  // Vartotojų valdymas
    Route::resource('conferences', ConferenceController::class);  // Konferencijų valdymas
});
