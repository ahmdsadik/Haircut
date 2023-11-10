@extends('dashboard.layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Profile</h4>

        <div class="card">
            <h5 class="card-header">Edit Profile</h5>



            <div class="card-body">

                @if(session('status'))
                    <div class=" my-2 alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('profile.update',$user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Profile Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', $user->name) }}"
                                   placeholder="Enter Profile Name">
                            @error('name')<span class="mt-2 text-danger"> {{ $message }} </span>  @enderror
                        </div>

                        <div class="col">
                            <label for="user_name" class="form-label">Profile Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   value="{{ old('user_name', $user->user_name) }}"
                                   placeholder="Enter Profile Name">
                            @error('user_name')<span class="mt-2 text-danger"> {{ $message }}  </span>@enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="email" class="form-label">Service Email</label>
                            <input type="email" min="1" class="form-control" id="email" name="email"
                                   value="{{ old('email',$user->email) }}"
                                   placeholder="Enter Profile Email">

                            @error('email')<span class="mt-2 text-danger"> {{ $message }}  </span>@enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="old" class="form-label">Profile Image</label>
                            <div>
                                <img id="old" src="{{ $user->getFirstMediaUrl('avatar') }}" class="img-fluid" alt="Image">
                            </div>
                        </div>

                        <div class="col w-100 h-100">
                            <div class="row">
                                <label for="avatar" class="form-label">Change Profile Image</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" class=" form-control
                                   @error('avatar') invalid @enderror" id="avatar" name="avatar"
                                       placeholder="Enter Profile Image">
                                @error('avatar') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="row mt-1">
                                <img id="output" class="img-fluid"/>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="mt-5 btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
        @endsection


        @push('js')

            <script>
                var loadFile = function (event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function () {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                };
            </script>

    @endpush
