@extends('dashboard.layouts.master')

@section('title')
    Create Setting
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Setting</h4>

        <div class="card">
            <h5 class="card-header">Create Setting</h5>

            <div class="card-body">
                @error('store-error')
                {{ $message }}
                @enderror

                <form action="{{ route('dashboard.settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="key" class="form-label">Key</label>
                            <input type="text" class="form-control @error('key') invalid  @enderror" id="key" name="key"
                                   value="{{ old('key') }}"
                                   placeholder="Enter Setting Key">
                            @error('key') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>

                        <div class="col">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') invalid  @enderror" id="title" name="title"
                                   value="{{ old('title') }}"
                                   placeholder="Enter Setting Title">
                            @error('title') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="phone" class="form-label"> Phone </label>

                            <input type="text" class="form-control @error('phone') invalid  @enderror" id="phone" name="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="Enter Setting Key">

                            @error('phone') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>

                        <div class="col">
                            <label for="address" class="form-label"> Address </label>
                            <textarea type="text" class="form-control @error('address') invalid  @enderror"
                                       id="address" name="address"
                                       placeholder="Enter Setting Content">{{ old('address') }}</textarea>
                            @error('address') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea type="text" class="form-control @error('content') invalid  @enderror"
                                  id="content" name="content"
                                  placeholder="Enter Setting Content">{{ old('content') }}</textarea>
                        @error('content') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
                    </div>


                    <div class="mb-3 row">
                        <div class="col">
                            <label for="image" class="form-label">Service Image</label>
                            <input type="file" accept="image/*"  class=" form-control @error('image') invalid @enderror"
                                   id="image" onchange="loadFile(event)" name="image"
                                   placeholder="Enter Setting Image">
                            @error('image') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror

                            <div class="mt-2">
                                <img id="output" class="img-fluid w-50 h-50"/>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

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
                }
            </script>

    @endpush
