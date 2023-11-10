@extends('dashboard.layouts.master')

@section('title')
    Edit Appointment
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Appointment</h4>

        <div class="card">
            <h5 class="card-header">Edit Appointment</h5>

            <div class="card-body">

                <livewire:edit-appointment :appointment="$appointment"/>

            </div>
        </div>
@endsection

