<?php

namespace App\Livewire;

use App\Models\Approval;
use Livewire\Component;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingForm extends Component
{
    public $vehicle_id, $driver_id, $destination;
    public $start_time, $end_time;
    public $approver_1, $approver_2;

    public function save()
    {
        $this->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'destination' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'approver_1' => 'required|exists:users,id',
            'approver_2' => 'required|exists:users,id',
        ]);

        $booking = Booking::create([
            'vehicle_id' => $this->vehicle_id,
            'driver_id' => $this->driver_id,
            'requested_by' => Auth::id(),
            'destination' => $this->destination,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        Approval::create([
            'booking_id' => $booking->id,
            'approver_id' => $this->approver_1,
            'level' => 1,
            'status' => 'pending',
        ]);

        Approval::create([
            'booking_id' => $booking->id,
            'approver_id' => $this->approver_2,
            'level' => 2,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Booking created successfully.');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.booking-form', [
            'vehicles' => Vehicle::all(),
            'drivers' => Driver::all(),
            'approvers' => User::where('role', 'approver')->get(),
        ]);
    }
}
