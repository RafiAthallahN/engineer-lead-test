<div class="max-w-6xl mx-auto space-y-6">
    <h2 class="text-2xl font-bold mb-4">Laporan Pemesanan Kendaraan</h2>

    <div class="flex items-center gap-4">
        <div>
            <label>Tanggal Mulai</label>
            <input type="date" wire:model="start_date" class="border rounded p-1" />
        </div>
        <div>
            <label>Tanggal Selesai</label>
            <input type="date" wire:model="end_date" class="border rounded p-1" />
        </div>
        <div class="mt-5">
            <a href="{{ route('booking.index.report', ['start' => $start_date, 'end' => $end_date]) }}"
                class="bg-green-600 text-white px-4 py-2 rounded">
                Export ke Excel
            </a>
        </div>
    </div>

    <table class="w-full mt-6 table-auto border">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Kendaraan</th>
                <th class="p-2 border">Driver</th>
                <th class="p-2 border">Tujuan</th>
                <th class="p-2 border">Pemesan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $b)
                <tr>
                    <td class="p-2 border">{{ $b->start_time }}</td>
                    <td class="p-2 border">{{ $b->vehicle->plate_number }}</td>
                    <td class="p-2 border">{{ $b->driver->name }}</td>
                    <td class="p-2 border">{{ $b->destination }}</td>
                    <td class="p-2 border">{{ $b->user->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>