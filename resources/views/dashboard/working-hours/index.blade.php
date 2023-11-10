@extends('dashboard.layouts.master')

@section('title')
    Working Hours
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Working Hours</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Working Hours</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.working-hours.create') }}"
                    class="btn btn-primary"
                >
                    Add Working Day Hour
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($workingHours as $workingHour)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $workingHour->day }}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $workingHour->from ?? "OFF"}}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $workingHour->to ?? "OFF" }}</strong>
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.working-hours.edit', $workingHour ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();document.getElementById('wh-{{ $workingHour->day }}').submit()"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                        <form
                                            action="{{ route('dashboard.working-hours.destroy',$workingHour) }}"
                                            id="wh-{{ $workingHour->day }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No Specializations found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

{{--                <div class="d-flex justify-content-center">--}}
{{--                    {{ $specializations->links() }}--}}
{{--                </div>--}}

            </div>
        </div>

@endsection
