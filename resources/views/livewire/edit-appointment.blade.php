<div>
    <form action="{{ route('dashboard.appointments.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control @error('customer_name') invalid  @enderror"
                       id="customer_name" wire:model="appointment.customer_name" name="customer_name"
                       placeholder="Enter Customer Name">
                @error('customer_name') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>

            <div class="col">
                <label for="phone" class="form-label">Customer Phone</label>
                <input type="tel" class="form-control @error('phone') invalid  @enderror" id="phone"
                       wire:model="appointment.phone" name="phone"
                       value="{{ old('phone') }}"
                       placeholder="Enter Customer Phone">
                @error('phone') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label for="service_id" class="form-label">Services</label>
                <select id="service_id" wire:model.live="appointment.service_id" name="service_id" class="form-select">
                    <option>------- Select Service -------</option>
                    @foreach($services as $service)
                        <option @selected($appointment->service_id == $service->id) value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id') <span
                    class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
            </div>


            <div class="col">
                <label for="stylist_id" class="form-label">Stylists</label>
                <select id="stylist_id" wire:model="stylist_id" name="stylist_id" class="form-select">
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
                <div class="col-md-10">
                    <input class="form-control" name="date" wire:model="appointment.date" type="date" id="date">
                </div>

                @error('date') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>

            <div class="col">
                <label for="time" class="col-md-2 col-form-label">Time</label>
                <div class="col-md-10">
                    <input class="form-control" name="time" wire:model="appointment.time" type="time" id="time">
                </div>

                @error('time') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>

