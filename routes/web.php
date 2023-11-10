<?php

use App\Enums\AppointmentStatus;
use App\Http\Controllers\ProfileController;
use App\Models\WorkingHour;
use Carbon\Carbon;
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


Route::get('/', \App\Http\Controllers\Front\HomeController::class)->name('home');

Route::get('test', function () {

    $fromTo = WorkingHour::where('from', '<>', null)->first();
//    dd($fromTo->from, $fromTo->to );
//    Carbon::createFromFormat('h A',$fromTo->from)->format('h:i A');
//    dd(Carbon::createFromFormat('h A', $fromTo->from)->format('H') , Carbon::createFromFormat('h A', $fromTo->to)->format('H'));

//    dd($fromTo);
    $times = collect();
    for ($i = 0; $i < 24; $i++) {
        $time = Carbon::create(0, 0, 0, $i);

//        if (Carbon::createFromFormat('h A', $fromTo->from)->format('H') <= $time->format('H') && Carbon::createFromFormat('h A', $fromTo->to)->format('H') > $time->format('H')) {
            $times->push($time->format('h A'));
//        }

//        $time = Carbon::createFromTime($i)->format('h:i A');
//        if () {
        continue;
//        }

    }

    return $times;
});

Route::get('take-appointment', [\App\Http\Controllers\Front\AppointmentController::class, 'create'])->name('take-appointment');
