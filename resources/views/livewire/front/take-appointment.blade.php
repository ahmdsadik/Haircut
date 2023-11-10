<div>
    <form wire:submit="save" method="post">
        <div class="row g-3 mb-5 text-danger">
            <div class="col-md-6">
                <label for="customer_name" class="form-label">Name</label>
                <input type="text" class="form-control @error('customer_name') invalid  @enderror"
                       id="customer_name" wire:model="customer_name" name="customer_name"
                       value="{{ old('customer_name') }}"
                       placeholder="Enter Name">
                @error('customer_name') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control @error('phone') invalid  @enderror" id="phone"
                       wire:model="phone" name="phone"
                       value="{{ old('phone') }}"
                       placeholder="Enter Phone">
                @error('phone') <span class="mt-1 d-block text-danger"> {{ $message }}  </span> @enderror
            </div>
            <div class="col-md-6">
                <label for="service_id" class="form-label">Services</label>
                <select id="service_id" wire:model.live="service_id" name="service_id" class="form-select">
                    <option>------- Select Service -------</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id') <span
                    class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
            </div>
            <div class="col-md-6">
                <label for="stylist_id" class="form-label">Stylists</label>
                <select id="stylist_id" wire:model.live="stylist_id" name="stylist_id" class="form-select" @if(!$service_id) disabled @endif>
                    <option>------- Select Stylist -------</option>
                    @foreach($stylists as $stylist)
                        <option value="{{ $stylist->id }}">{{ $stylist->name }}</option>
                    @endforeach
                </select>
                @error('stylist_id') <span
                    class="mt-1 d-block text-danger"> {{  $message }} </span> @enderror
            </div>
            <div class="col-md-6">
                <label for="date" class="col-md-2 col-form-label">Date</label>
                <select id="date" wire:model.live="date" name="date" class="form-select" @if(!$stylist_id) disabled @endif>
                    <option>------- Select Date -------</option>
                    @foreach($dates as $d)
                        <option value="{{ $d }}">{{ $d }}</option>
                    @endforeach
                </select>

                @error('date') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>
            <div class="col-md-6">
                <label for="time" class="col-md-2 col-form-label">Time</label>
                <select id="time"  wire:model.live="time" name="time" class="form-select" @if(!$date) disabled @endif>
                    <option>------- Select Date -------</option>
                    @foreach($times as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>

                @error('time') <span class="mt-1 d-block text-danger"> {{ $message }} </span> @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger rounded-0 px-3">Take Appointment</button>
        </div>
    </form>
</div>
