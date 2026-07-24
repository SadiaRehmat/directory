<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Auth\DoctorRegistrationController as DoctorRegistrationController;
use App\Http\Controllers\Admin\DoctorController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Goup middleware
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

});

Route::middleware(['auth', 'doctor', 'approved'])->group(function () {

    Route::get('/doctor/dashboard', [DoctorDashboardController::class, 'index'])
        ->name('doctor.dashboard');

});

Route::middleware(['auth', 'patient'])->group(function () {

    Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
        ->name('patient.dashboard');

});

Route::middleware('guest')->group(function () {  //loggedin user can't access

    Route::get('/doctor/register', [DoctorRegistrationController::class, 'create'])
        ->name('doctor.register');

    Route::post('/doctor/register', [DoctorRegistrationController::class, 'store'])
        ->name('doctor.register.store');




});

Route::get('/admin/doctors', [DoctorController::class, 'index'])
    ->name('admin.doctors.index');

// Approve doctor route
Route::patch('/admin/doctors/{doctor}/approve', [DoctorController::class, 'approve'])
    ->name('admin.doctors.approve');


// View Doctors
Route::get('/admin/doctors/{doctor}', [DoctorController::class, 'show'])
    ->name('admin.doctors.show');

// Pending doctor soute
Route::get('/doctor/pending', function () {
    return view('doctor.pending');
})->middleware(['auth', 'doctor'])->name('doctor.pending');


require __DIR__ . '/auth.php';
