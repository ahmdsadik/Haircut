@extends('dashboard.layouts.master')

@section('title')
    Edit Appointment Status
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Appointment</h4>

        <div class="card">
            <h5 class="card-header">Edit Appointment</h5>

            <div class="card-body">

                <form action="{{ route('dashboard.appointments.update' , $appointment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col">
                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control"
                                   disabled
                                   id="customer_name" value="{{ $appointment->customer_name }}"
                                   placeholder="Enter Customer Name">
                            @error('customer_name') <span
                                class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>

                        <div class="col">
                            <label for="phone" class="form-label">Customer Phone</label>
                            <input type="tel" class="form-control @error('phone') invalid  @enderror" id="phone"

                                   disabled
                                   value="{{ $appointment->phone }}"
                                   placeholder="Enter Customer Phone">
                            @error('phone') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="service_id" class="form-label">Services</label>
                            <input type="text" class="form-control @error('service_id') invalid  @enderror"
                                   id="service_id"

                                   disabled
                                   value="{{ $appointment->service->name }}"
                                   placeholder="Enter service Name">
                            @error('service_id') <span
                                class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
                        </div>


                        <div class="col">
                            <label for="stylist_id" class="form-lab2el">Stylists</label>
                            <input type="text" class="form-control @error('stylist_id') invalid  @enderror "
                                   id="stylist_id"

                                   disabled
                                   value="{{ $appointment->stylist->name }}"
                                   placeholder="Enter stylist Name">
                            @error('stylist_id') <span
                                class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">

                            <label for="date" class="col-md-2 col-form-label">Date</label>
                            <input type="text" class="form-control" id="date"
                                   disabled
                                   value="{{ $appointment->service->name }}"
                                   placeholder="Enter Date">

                            @error('date') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col">
                            <label for="status" class="col-md-2 col-form-label">Status</label>
                            <select id="status" value="status" name="status" class="form-select">
                                <option>------- Select Status -------</option>
                                @foreach(\App\Enums\AppointmentStatus::cases() as $status)
                                    <option
                                        @selected(old('status', $appointment->status) == $status) value="{{ $status->value }}">{{ $status->name }}</option>
                                @endforeach
                            </select>

                            @error('status') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>


            </div>
        </div>

@endsection
