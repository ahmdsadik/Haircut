@extends('dashboard.layouts.master')

@section('title')
    Create Working Hour
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Working Hour</h4>

        <div class="card">
            <h5 class="card-header">Create Working Hour</h5>

            <div class="card-body">
                <form action="{{ route('dashboard.working-hours.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="day" class="form-label">Day</label>
                            <select class="form-control" name="day" id="day">
                                <option value="" class="text-center" >-----Select Day-----</option>
                                @foreach(\App\Enums\WorkingDays::cases() as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>

                            @error('day')
                            <span class="mt-1 d-block text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="from" class="form-label">From</label>
                            <select class="form-control" name="from" id="from">
                                <option value="" class="text-center" >-----Select Time-----</option>
                                @foreach($times as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>

                            @error('from')
                            <span class="mt-1 d-block text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="to" class="form-label">To</label>
                            <select class="form-control" name="to" id="to">
                                <option value="" class="text-center" >-----Select Time-----</option>
                                @foreach($times as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>

                            @error('to')
                            <span class="mt-1 d-block text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
@endsection
