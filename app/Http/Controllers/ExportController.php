<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Booking;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(Booking::with('vehicle', 'driver', 'user')
            ->when($request->start, fn($q) => $q->whereDate('start_time', '>=', $request->start))
            ->when($request->end, fn($q) => $q->whereDate('end_time', '<=', $request->end))
            ->get()
            ->map(function ($b) {
                return [
                    'Tanggal' => $b->start_time,
                    'Kendaraan' => $b->vehicle->plate_number,
                    'Driver' => $b->driver->name,
                    'Tujuan' => $b->destination,
                    'Pemesan' => $b->user->name,
                ];
            }));
    }
}
