<div class="max-w-4xl mx-auto space-y-4">
    <h2 class="text-xl font-semibold mb-4">Daftar Pemesanan Menunggu Persetujuan</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="bg-red-100 text-red-800 p-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    @forelse ($approvals as $approval)
        <div class="border p-4 rounded shadow">
            <p><strong>Kendaraan:</strong> {{ $approval->booking->vehicle->plate_number }}</p>
            <p><strong>Driver:</strong> {{ $approval->booking->driver->name }}</p>
            <p><strong>Tujuan:</strong> {{ $approval->booking->destination }}</p>
            <p><strong>Waktu:</strong> {{ $approval->booking->start_time }} - {{ $approval->booking->end_time }}</p>
            <p><strong>Level Approval:</strong> {{ $approval->level }}</p>

            <div class="mt-2">
                <textarea wire:model="note" class="w-full border rounded p-2" placeholder="Catatan (opsional)"></textarea>
            </div>

            <div class="flex gap-2 mt-2">
                <button wire:click="approve({{ $approval->id }})"
                    class="bg-green-600 text-white px-4 py-1 rounded">Setujui</button>
                <button wire:click="reject({{ $approval->id }})"
                    class="bg-red-600 text-white px-4 py-1 rounded">Tolak</button>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Tidak ada pemesanan yang perlu disetujui.</p>
    @endforelse
</div>