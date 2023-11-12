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
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse($specializations as $specialization)
                <tr>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $specialization->name
                            }}</strong>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-primary"
                                   data-bs-toggle="modal"
                                   data-bs-target="#modalCenter"
                                   href="{{ route('dashboard.specializations.edit', $specialization->id) }}}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item"
                                   href="{{ route('dashboard.specializations.destroy',$specialization->id) }}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                                >
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

        </div>
    </div>
    @endsection
