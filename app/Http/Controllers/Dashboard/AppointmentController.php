<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\AppointmentStoreRequest;
use App\Http\Requests\Appointment\ChangeAppointmentStatusRequest;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('dashboard.appointments.index',
            [
                'appointments' => Appointment::with(['stylist', 'service'])->paginate(10)
            ]
        );
    }

    public function create()
    {
        return view('dashboard.appointments.create',
            [
                'services' => Service::all(),
                'stylists' => Stylist::all(),
            ]
        );
    }

    public function store(AppointmentStoreRequest $request)
    {
//        return $request->validated();

        Appointment::create($request->validated());

        return to_route('dashboard.appointments.index');
    }

    public function show(Appointment $appointment)
    {
    }

    public function edit(Appointment $appointment)
    {
        return view('dashboard.appointments.edit',
            [
                'appointment' => $appointment
            ]
        );
    }

    public function update(ChangeAppointmentStatusRequest $request, Appointment $appointment)
    {

        $appointment->update($request->validated());

        return to_route('dashboard.appointments.index');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return to_route('dashboard.appointments.index');
    }

    public function changeStatus(Appointment $appointment)
    {

        return view('dashboard.appointments.change-status',
            [
                'appointment' => $appointment
            ]
        );
    }
}
