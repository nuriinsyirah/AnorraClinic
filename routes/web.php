<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnorraController;

/*
|--------------------------------------------------------------------------
| Public Front-End Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AnorraController::class, 'home'])->name('home');
Route::get('/about', [AnorraController::class, 'about'])->name('about');
Route::post('/logout', [AnorraController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Guest Only Routes (Login & Registration Features)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    // Login endpoints
    Route::get('/login', [AnorraController::class, 'showLogin'])->name('login');
    Route::post('/login', [AnorraController::class, 'login']);

    // Registration endpoints
    Route::get('/register', [AnorraController::class, 'showRegister'])->name('register');
    Route::post('/register', [AnorraController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Authenticated Patient (User) Dashboard Framework Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AnorraController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/profile', [AnorraController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile', [AnorraController::class, 'updateUserProfile'])->name('user.profile.update');
    Route::get('/my-appointments', [AnorraController::class, 'userAppointments'])->name('user.appointments');
    Route::get('/book-appointment', [AnorraController::class, 'showCreateAppointment'])->name('user.appointment.create');
    Route::post('/book-appointment', [AnorraController::class, 'storeAppointment']);
    Route::post('/appointment/cancel/{id}', [AnorraController::class, 'cancelAppointment'])->name('user.appointment.cancel');
});

/*
|--------------------------------------------------------------------------
| Authenticated Admin Dashboard Control Management Area Route List
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [AnorraController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/profile', [AnorraController::class, 'adminProfile'])->name('profile');
    
    // Patient Routes
    Route::get('/patients', [AnorraController::class, 'adminPatients'])->name('patients');
    Route::get('/patients/add', [\App\Http\Controllers\AnorraController::class, 'showAddPatient'])->name('patients.add');
    Route::post('/patients/store', [AnorraController::class, 'storePatient'])->name('patients.store');
    Route::delete('/patients/delete/{id}', [AnorraController::class, 'deletePatient'])
    ->name('patients.delete');

    // Appointment Routes
    Route::get('/appointments', [AnorraController::class, 'adminAppointments'])->name('appointments');
    Route::post('/appointment/{id}/{status}', [AnorraController::class, 'adminUpdateAppointmentStatus'])->name('appointment.status');
});