@extends('dashboard.layouts.master')

@section('title')
    Edit Service
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Service</h4>

        <div class="card">
            <h5 class="card-header">Edit Service</h5>

            <div class="card-body">
                <form action="{{ route('dashboard.services.update',$service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $service->name) }}"
                               placeholder="Enter Specialization Name">
                        @error('name')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Specialization Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"
                                  placeholder="Enter Specialization Description Name">{{ old('description',$service->description) }}</textarea>

                        @error('description')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="duration" class="form-label">Service Duration</label>
                            <input type="number" min="1" class="form-control" id="duration" name="duration"
                                   value="{{ old('duration',$service->duration) }}"
                                   placeholder="Enter service duration">
                            @error('duration')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                        </div>

                        <div class="col">
                            <label for="price" class="form-label">Service Price</label>
                            <input type="number" min="10" class="form-control" id="price" name="price"
                                   value="{{ old('price',$service->price) }}"
                                   placeholder="Enter Service Price">

                            @error('price')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                        </div>
                    </div>

                    <input class="form-check-input" type="hidden" value="0" name="is_published">

                    <div class="mb-3 row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1"
                                       @checked( old('is_published', $service->is_published) ) name="is_published"
                                       id="is_published">
                                <label class="form-check-label" for="is_published">
                                    Can be published
                                </label>
                            </div>

                            @error('is_published')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror

                        </div>


                    </div>

                    <div class="mb-3 row">

                        <div class="col">
                            <label for="image" class="form-label">Service Image</label>
                            <img src="{{ $service->getFirstMediaUrl('service_image') }}" class="img-fluid " alt="Image">
                        </div>

                        <div class="col w-100 h-100">
                            <div class="row">
                                <label for="image" class="form-label">Change Service Image</label>
                                <input type="file" accept="image/*"  onchange="loadFile(event)" class=" form-control
                                   @error('image') invalid @enderror" id="image" name="image"
                                       placeholder="Enter Service Image">
                                @error('image')<span class="mt-2 text-danger"> {{ $message }} </span> @enderror
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
