<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Maršrutai registracijai
Route::prefix('client')->name('client.')->group(function() {
    Route::get('conferences', [ClientController::class, 'index'])->name('conferences');  // Klientų konferencijų sąrašas
    Route::get('conference/{id}', [ClientController::class, 'show'])->name('conference');  // Viena konferencija
    Route::post('register/{id}', [ClientController::class, 'register'])->name('register');  // Registracija į konferenciją

    // Registracijos forma
    Route::get('register_form/{conference_id}', [ClientController::class, 'showRegistrationForm'])->name('register.form');
});

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    // Darbuotojo konferencijų sąrašas
    Route::get('conferences', [EmployeeController::class, 'index'])->name('conferences');
    
    // Darbuotojo konferencijos, kur jis matys užsiregistravusius klientus
    Route::get('conference/{id}', [EmployeeController::class, 'show'])->name('conference');
});

Route::middleware('auth', 'can:admin')->prefix('admin')->name('admin.')->group(function () {
    // Konferencijos maršrutai
    Route::get('conferences', [AdminController::class, 'index'])->name('conferences.index');
    Route::get('conferences/create', [AdminController::class, 'create'])->name('conferences.create');
    Route::post('conferences', [AdminController::class, 'store'])->name('conferences.store');
    Route::get('conferences/{id}/edit', [AdminController::class, 'edit'])->name('conferences.edit');
    Route::put('conferences/{id}', [AdminController::class, 'update'])->name('conferences.update');
    Route::delete('conferences/{id}', [AdminController::class, 'destroy'])->name('conferences.destroy');

    // Naudotojų informacijos redagavimas
    Route::get('users', [AdminController::class, 'showUsers'])->name('users.index');
    Route::get('users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
});


Route::prefix('client')->name('client.')->group(function() {
    Route::get('conferences', [ClientController::class, 'index'])->name('conferences');
    Route::get('conference/{id}', [ClientController::class, 'show'])->name('conference');
    Route::post('register/{id}', [ClientController::class, 'register'])->name('register');
    Route::get('register_form/{conference_id}', [ClientController::class, 'showRegistrationForm'])->name('register.form');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');  // Admin puslapis
});

Route::get('/employee', [EmployeeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('client')->name('client.')->group(function() {
    Route::get('conferences', [ClientController::class, 'index'])->name('conferences');
    Route::get('conference/{id}', [ClientController::class, 'show'])->name('conference');
    Route::post('register/{id}', [ClientController::class, 'register'])->name('register');
    Route::get('register_form/{conference_id}', [ClientController::class, 'showRegistrationForm'])->name('register.form');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');

require __DIR__.'/auth.php';
