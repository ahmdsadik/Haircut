@extends('front.layouts.master')

@section('content')
    <!-- Appointment Start -->


    @if(session('message'))
        <div class="container-xxl mt-3 alert alert-dark alert-dismissible " role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-xxl py-5 mt-5" style="background: white">

        <div class="container text-bg-light ">

            <div class="text-center mx-auto mb-5">
                <h1 class="text-uppercase text-danger">Take Appointment</h1>
            </div>

            <livewire:front.take-appointment />

        </div>
    </div>
    <!-- Appointment End -->

@endsection
