{{-- appointments/form.blade.php --}}
<form class="container-sm" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @isset($edit)
        @method('PATCH')
    @endisset

    <div class="row g-3">
        {{-- Time Field --}}
        <div class="col">
            <x-textfield 
                name="time" 
                label="Appointment Time" 
                type="time" 
                :value="$appointment->time ?? old('time')" 
                placeholder="Enter appointment time" 
            />
        </div>

        {{-- Date Field --}}
        <div class="col">
            <x-textfield 
                name="date" 
                label="Appointment Date" 
                type="date" 
                :value="$appointment->date ?? old('date')" 
                placeholder="Enter appointment date" 
            />
        </div>
    </div>

    <div class="row g-3">
        {{-- Client Selection --}}
        <div class="col">
            @php
                $clientOptions = $clients->map(function ($client) {
                    return ['value' => $client->id, 'label' => $client->firstname . ' ' . $client->lastname];
                });
            @endphp

            <x-selectfield 
                :options="$clientOptions" 
                name="client_id" 
                label="Select Client" 
                :value="$appointment->client_id ?? old('client_id')" 
            />
        </div>

        {{-- Status Field --}}
        <div class="col">
            @php
                $statusOptions = [
                    ['value' => 'pending', 'label' => 'Pending'],
                    ['value' => 'confirmed', 'label' => 'Confirmed'],
                    ['value' => 'completed', 'label' => 'Completed'],
                    ['value' => 'canceled', 'label' => 'Canceled']
                ];
            @endphp

            <x-selectfield 
                :options="$statusOptions" 
                name="status" 
                label="Appointment Status" 
                :value="$appointment->status ?? old('status')" 
            />
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
