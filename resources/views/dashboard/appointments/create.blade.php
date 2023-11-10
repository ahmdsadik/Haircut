@extends('dashboard.layouts.master')

@section('title')
    Create Appointment
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Appointment</h4>

        <div class="card">
            <h5 class="card-header">Create Appointment</h5>

            <div class="card-body">

                <livewire:store-appointment/>

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
