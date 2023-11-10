@extends('dashboard.layouts.master')

@section('title')
    Settings
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Settings</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Settings</h5>

            <div class="ms-3 mb-4">
                <a
                    href="{{ route('dashboard.settings.create') }}"
                    class="btn btn-primary"
                >
                    Add Settings
                </a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($settings as $setting)
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $setting->key }}</strong>
                            </td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $setting->title }}</strong>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.settings.edit', $setting ) }}"><i
                                                class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();document.getElementById('sp-{{ $setting->key }}').submit()"><i
                                                class="bx bx-trash me-1"></i>Delete</a>
                                        <form
                                            action="{{ route('dashboard.settings.destroy',$setting) }}"
                                            id="sp-{{ $setting->key }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="3">No Settings found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{--                <div class="d-flex justify-content-center">--}}
                {{--                    {{ $settings->links() }}--}}
                {{--                </div>--}}

            </div>
        </div>

@endsection
