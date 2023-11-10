@extends('dashboard.layouts.master')

@section('title')
    Specializations
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Specializations</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Specializations</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.specializations.create') }}"
                    class="btn btn-primary"
                >
                    Add Specialization
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($specializations as $specialization)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $specialization->name }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ Str::limit($specialization->description,30) }}</strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.specializations.edit', $specialization ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();document.getElementById('sp-{{ $specialization->id }}').submit()"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                        <form
                                            action="{{ route('dashboard.specializations.destroy',$specialization) }}"
                                            id="sp-{{ $specialization->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="2">No Specializations found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $specializations->links() }}
                </div>

            </div>
        </div>

@endsection
