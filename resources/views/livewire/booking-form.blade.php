<div class="max-w-2xl mx-auto space-y-4">
    @if (session()->has('success'))
        <div class="bg-green-100 p-2 rounded">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label>Kendaraan</label>
            <select wire:model="vehicle_id" class="w-full border rounded p-2">
                <option value="">Pilih kendaraan</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->plate_number }} - {{ $vehicle->brand }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Driver</label>
            <select wire:model="driver_id" class="w-full border rounded p-2">
                <option value="">Pilih driver</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tujuan</label>
            <textarea wire:model="destination" class="w-full border rounded p-2"></textarea>
        </div>

        <div>
            <label>Waktu Mulai</label>
            <input type="datetime-local" wire:model="start_time" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Waktu Selesai</label>
            <input type="datetime-local" wire:model="end_time" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Approver 1</label>
            <select wire:model="approver_1" class="w-full border rounded p-2">
                <option value="">Pilih approver 1</option>
                @foreach($approvers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Approver 2</label>
            <select wire:model="approver_2" class="w-full border rounded p-2">
                <option value="">Pilih approver 2</option>
                @foreach($approvers as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Pemesanan</button>
    </form>
</div>
