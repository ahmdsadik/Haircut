@extends('dashboard.layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Service</h4>

        <div class="card">
            <h5 class="card-header">Create Service</h5>

            <div class="card-body">
                @error('store-error')
                    {{ $message }}
                @enderror

                <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control @error('name') invalid  @enderror" id="name" name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter Service Name">
                        @error('name')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Service Description</label>
                        <textarea type="text" class="form-control @error('description') invalid  @enderror"
                                  id="description" name="description"
                                  placeholder="Enter Specialization Description">{{ old('description') }}</textarea>
                        @error('description')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="duration" class="form-label">Service Duration</label>
                            <input type="number" min="1" class="form-control @error('duration') invalid  @enderror" id="duration"
                                   name="duration"
                                   value="{{ old('duration') }}"
                                   placeholder="Enter service duration">
                            @error('duration')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col">
                            <label for="price" class="form-label">Service Price</label>
                            <input type="number" min="10" class="form-control @error('price') invalid  @enderror"
                                   value="{{ old('price') }}"
                                   id="price" name="price"
                                   placeholder="Enter Service Price">
                            @error('price')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input @error('is_published') invalid  @enderror"
                                       @checked(old('is_published' ))
                                       type="checkbox" value="1" name="is_published" id="is_published">
                                <label class="form-check-label" for="is_published">
                                    Can be published
                                </label>
                                @error('is_published')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                            </div>
                        </div>

                        <div class="col">
                            <label for="image" class="form-label">Service Image</label>
                            <input type="file" accept="image/*" onchange="loadFile(event)" class=" form-control
                                   @error('image') invalid @enderror" id="image" name="image"
                                   placeholder="Enter Service Image">
                            @error('image')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                            <div class="mt-2">
                                <img id="output" class="img-fluid w-100 h-100"/>
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
                };
            </script>

    @endpush
