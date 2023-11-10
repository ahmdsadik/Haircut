<?php

use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SpecializationController;
use App\Http\Controllers\Dashboard\StylistController;
use App\Http\Controllers\Dashboard\WorkingHourController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::as('dashboard.')->middleware(['auth'])->group(function () {
    Route::get('/', DashboardController::class)->name('index');

    ######################## Start Specialization Routes ################################
    Route::resource('specializations', SpecializationController::class)->scoped(['specialization' => 'name']);
    ######################## End Specialization Routes ##################################

    ######################## Start Services Routes ################################
    Route::resource('services', ServiceController::class)->except(['show'])->scoped(['service' => 'name']);
    ######################## End Services Routes ##################################


    ######################## Start Services Routes ################################
    Route::resource('stylists', StylistController::class)->scoped(['stylist' => 'email']);
    ######################## End Services Routes ##################################

    ######################## Start Appointment Routes ################################
    Route::resource('appointments', AppointmentController::class)->except(['show'])->scoped(['appointment' => 'customer_name']);
    ######################## End Appointment Routes ##################################

    ######################## Start Working Hours Routes ################################
    Route::resource('working-hours', WorkingHourController::class)->except(['show'])->scoped(['working_hour' => 'day']);
    ######################## End Working Hours Routes ##################################

    ######################## Start Settings Routes ################################
    Route::resource('settings', SettingController::class)->except(['show'])->scoped(['setting' => 'key']);
    ######################## End Settings Routes ##################################


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
