@extends('dashboard.layouts.master')

@section('title')
    Stylists
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Services</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Stylists</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.stylists.create') }}"
                    class="btn btn-primary"
                >
                    Add Stylist
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($stylists as $stylist)
                        <tr>

                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-l pull-up" title=""
                                        data-bs-original-title="{{ $stylist->name }}">
                                        <img src="{{ $stylist->getFirstMediaUrl('stylist_image') }}" alt="Avatar"
                                             class="rounded-circle">
                                    </li>
                                </ul>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $stylist->first_name . ' ' . $stylist->last_name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $stylist->email }}</strong>
                            </td>

                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $stylist->specialization->name }}</strong>
                            </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{ route('dashboard.stylists.edit', $stylist ) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a class="dropdown-item" href="#"
                                               onclick="event.preventDefault();document.getElementById('st-{{ $stylist->id }}').submit()"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
                                            <form
                                                action="{{ route('dashboard.stylists.destroy', $stylist) }}"
                                                id="st-{{ $stylist->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Services found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $stylists->links() }}
                </div>

            </div>
        </div>

@endsection
