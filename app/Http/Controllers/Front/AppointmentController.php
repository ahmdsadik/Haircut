<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('front.appointment.create');
    }

    public function store()
    {
//        return view('front.appointment.store');
    }
}
