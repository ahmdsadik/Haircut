@extends('dashboard.layouts.master')

@section('title')
    Apointments
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Appointments</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Appointments</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.appointments.create') }}"
                    class="btn btn-primary"
                >
                    Add Appointment
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Stylist</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $appointment->id }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $appointment->customer_name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $appointment->service->name }}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $appointment->stylist->first_name }}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $appointment->appointment_at->format('Y-m-d h:i A') }}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>
                                    <span class="badge bg-label-primary">{{ $appointment->status->name }}</span>
                                </strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.appointments.edit', $appointment ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.appointments.change-status', $appointment ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Change Status</a>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();document.getElementById('sp-{{ $appointment->phone }}').submit()"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                        <form
                                            action="{{ route('dashboard.appointments.destroy', $appointment) }}"
                                            id="sp-{{ $appointment->phone }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Appointments Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $appointments->links() }}
                </div>

            </div>
        </div>

@endsection
