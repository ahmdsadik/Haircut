@extends('dashboard.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Congratulations {{ auth()->user()->name }}! 🎉</h5>
                                <p class="mb-4">
                                    Welcome Back! Manage your account, check your latest and your business.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('assets/dashboard/img/illustrations/undraw_barber_-3-uel.svg') }}"
                                    height="140"
                                    alt="View Badge User"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img
                                            src="{{ asset('assets/dashboard/img/icons/unicons/chart-success.png') }}"
                                            alt="chart success"
                                            class="rounded"
                                        />
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt3"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                             aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="{{ route('dashboard.appointments.index') }}">View
                                                More</a>
{{--                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Total Appointments</span>
                                <h3 class="card-title mb-2">{{ \App\Models\Appointment::getTotalCount() }}</h3>
{{--                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>--}}
{{--                                    +72.80%</small>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
@endsection
