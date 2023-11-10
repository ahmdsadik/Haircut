@extends('dashboard.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Specialization</h4>

        <div class="card">
            <h5 class="card-header">Create Specialization</h5>

            <div class="card-body">
                <form action="{{ route('dashboard.specializations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Specialization Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Specialization Name">
                        @error('name')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Specialization Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"
                                  placeholder="Enter Specialization Description"></textarea>

                        @error('description')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
@endsection
