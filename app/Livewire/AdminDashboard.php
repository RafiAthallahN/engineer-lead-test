<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $chartData;

    public function loadData()
    {
        $bookings = Booking::select(
            DB::raw("strftime('%Y-%m', start_time) as month"),
            DB::raw('count(*) as total')
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $this->chartData = [
            'labels' => $bookings->pluck('month'),
            'data' => $bookings->pluck('total')
        ];
    }

    public function mount(): void
    {
        $this->loadData();
    }
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
