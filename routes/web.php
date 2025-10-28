<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\PatientController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Hospital\HospitalController;
use App\Http\Controllers\Hospital\BloodstockController;

Route::get('/', [RegisterController::class, 'home']);
Route::get('/login', [LoginController::class, 'showlogin'])->name('auth.login');

Route::get('/register', [RegisterController::class, 'showregister'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.submit');

Route::post('/login', [LoginController::class, 'login'])->name('auth.login.submit');
Route::post('/profile/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/blood-availability', function () {
    return view('bloodavailability');
});

Route::middleware('auth:patient')->group(function () {
    // Profile
    Route::get('/profile', [PatientController::class, 'profile'])->name('patient.profile');
    Route::put('/profile', [PatientController::class, 'updateProfile'])->name('patient.updateProfile');

    // History
    Route::get('/history', [PatientController::class, 'history'])->name('patient.history');
});

Route::get('/hospital/login', [HospitalController::class, 'showlogin'])->name('hospital.login');
Route::post('/hospital/login', [HospitalController::class, 'login'])->name('hospital.login.submit');
Route::post('/logout', [HospitalController::class, 'logout'])->name('hospital.logout');

Route::get('/hospital/register', [HospitalController::class, 'showRegisterForm'])->name('hospital.register');
Route::post('/hospital/register', [HospitalController::class, 'register'])->name('hospital.register.submit');

Route::get('/blood-availability', [BloodStockController::class, 'searchForm'])->name('blood.search');
Route::post('/blood-availability', [BloodStockController::class, 'search'])->name('blood.search.results');


 Route::middleware('auth:hospital')->group(function() {
    Route::get('/dashboard', [HospitalController::class, 'dashboard'])->name('hospital.dashboard');
    // Route::post('/logout', [HospitalController::class, 'logout'])->name('hospital.logout');
    Route::get('/hospital/profile', [HospitalController::class, 'profile'])->name('hospital.profile');
    Route::put('/hospital/profile', [HospitalController::class, 'updateProfile'])->name('hospital.profile.update');
    Route::get('blood-stock', [BloodstockController::class, 'index'])->name('hospital.bloodstock.index');
    Route::get('blood-stock/create', [BloodstockController::class, 'create'])->name('hospital.bloodstock.create');
    Route::post('blood-stock/store', [BloodstockController::class, 'store'])->name('hospital.bloodstock.store');
    Route::get('blood-stock/{bloodStock}/edit', [BloodStockController::class, 'edit'])->name('hospital.bloodstock.edit');
    Route::put('blood-stock/{bloodStock}', [BloodStockController::class, 'update'])->name('hospital.bloodstock.update');
    Route::delete('blood-stock/{bloodStock}', [BloodStockController::class, 'destroy'])->name('hospital.bloodstock.destroy');
    });