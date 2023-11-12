<div>
    {{--    <form action="{{ route('dashboard.appointments.store') }}" method="POST">--}}
    <form wire:submit="save" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control @error('form.customer_name') invalid  @enderror"
                       id="customer_name" wire:model="form.customer_name"
                       placeholder="Enter Customer Name">
                @error('form.customer_name') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>

            <div class="col">
                <label for="phone" class="form-label">Customer Phone</label>
                <input type="tel" class="form-control @error('form.phone') invalid  @enderror" id="phone"
                       wire:model="form.phone"
                       placeholder="Enter Customer Phone">
                @error('form.phone') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="service_id" class="form-label">Services</label>
                <select id="service_id" wire:model.live="form.service_id" class="form-select">
                    <option>------- Select Service -------</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id') <span
                    class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
            </div>


            <div class="col">
                <label for="stylist_id" class="form-label">Stylists</label>
                <select id="stylist_id" wire:model.live="form.stylist_id" class="form-select"
                        @if(!$form->service_id) disabled @endif>
                    <option>------- Select Stylist -------</option>
                    @foreach($stylists as $stylist)
                        <option value="{{ $stylist->id }}">{{ $stylist->name }}</option>
                    @endforeach
                </select>
                @error('stylist_id') <span
                    class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="date" class="col-md-2 col-form-label">Date</label>
                <select id="date" wire:model.live="date" class="form-select"
                        @if(!$form->stylist_id) disabled @endif>
                    <option>------- Select Date -------</option>
                    @foreach($dates as $d)
                        <option value="{{ $d }}">{{ $d }}</option>
                    @endforeach
                </select>

                @error('date') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>

            <div class="col">
                <label for="time" class="col-md-2 col-form-label">Time</label>
                <select id="time" wire:model.live="time" class="form-select" @if(!$date) disabled @endif>
                    <option>------- Select Date -------</option>
                    @foreach($times as $t)
                        <option @selected(old('time', $time) == $t) value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>

                @error('time') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>

