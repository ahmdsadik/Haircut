@extends('dashboard.layouts.master')

@section('title')
    Edit Stylist
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Edit Stylist</h4>

        <div class="card">
            <h5 class="card-header">Edit Stylist</h5>

            <div class="card-body">
                @error('store-error')
                {{ $message }}
                @enderror

                <form action="{{ route('dashboard.stylists.update', $stylist ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') invalid  @enderror"
                                   id="first_name" name="first_name"
                                   value="{{ old('first_name',$stylist->first_name) }}"
                                   placeholder="Enter First Name">
                            @error('first_name')
                            <span class="mt-1 d-block text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') invalid  @enderror"
                                   id="last_name" name="last_name"
                                   value="{{ old('last_name',$stylist->last_name) }}"
                                   placeholder="Enter Last Name">
                            @error('last_name') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <div class="col">
                            <label for="email" class="form-label">Stylist Email</label>
                            <input type="email" min="1" class="form-control @error('email') invalid  @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email',$stylist->email) }}"
                                   placeholder="Enter Stylist Email">
                            @error('email') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col">
                            <label for="phone" class="form-label">Stylist Phone</label>
                            <input type="tel" min="10" class="form-control @error('phone') invalid  @enderror"
                                   value="{{ old('phone',$stylist->phone) }}"
                                   id="phone" name="phone"
                                   placeholder="Enter Stylist Phone">
                            @error('phone') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Stylist Address</label>
                        <textarea type="text" class="form-control @error('address') invalid  @enderror"
                                  id="address" name="address"
                                  placeholder="Enter Stylist Address">{{ old('address',$stylist->address) }}</textarea>
                        @error('address') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-3 row">
                        <div class="col">
                            <label for="specialization_id" class="form-label">Specializations</label>
                            <select id="specialization_id" name="specialization_id" class="form-select">
                                <option>------- Select Specialization -------</option>
                                @foreach($specializations as $specialization)
                                    <option @selected(old('specialization_id', $stylist->specialization_id) == $specialization->id) value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                            @error('specialization_id') <span
                                class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
                        </div>

                    </div>

                    <div class="mb-3 row">

                        <div class="col">
                            <label for="image" class="form-label">Stylist Image</label>
                            <img src="{{ $stylist->getFirstMediaUrl('stylist_image') }}" class="img-fluid" alt="Image">
                        </div>

                        <div class="col w-100 h-100">
                            <div class="row">
                                <label for="image" class="form-label">Change Stylist Image</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" class=" form-control
                                   @error('image') invalid @enderror" id="image" name="image"
                                       placeholder="Enter Stylist Image">
                                <span class="mt-1 d-block text-danger">@error('image') {{ $message }}  @enderror</span>
                            </div>
                            <div class="row mt-1">
                                <img id="output" class="img-fluid"/>
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
