@extends('dashboard.layouts.master')

@section('title')
    Services
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Services</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Services</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.services.create') }}"
                    class="btn btn-primary"
                >
                    Add Service
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($services as $service)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $service->name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ Str::limit($service->description,30) }}</strong>
                            </td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-l pull-up" title=""
                                        data-bs-original-title="{{ $service->name }}">
                                        <img src="{{ $service->getFirstMediaUrl('service_image') }}" alt="Avatar"
                                             class="rounded-circle">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $service->price }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $service->duration }}</strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.services.edit', $service ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();document.getElementById('sp-{{ $service->name }}').submit()"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                        <form
                                            action="{{ route('dashboard.services.destroy', $service) }}"
                                            id="sp-{{ $service->name }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Services Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $services->links() }}
                </div>

            </div>
        </div>


@endsection
