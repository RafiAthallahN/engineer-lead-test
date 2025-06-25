<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;

class BookingReport extends Component
{
    public $start_date;
    public $end_date;

    public function render()
    {
        $q = Booking::with(['vehicle', 'driver', 'user'])
            ->when($this->start_date, function ($query) {
                $query->whereDate('start_time', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                $query->where('end_time', '<=', $this->end_date);
            })
            ->latest();
        return view('livewire.booking-report', [
            'bookings' => $q->get(),
        ]);
    }
}
