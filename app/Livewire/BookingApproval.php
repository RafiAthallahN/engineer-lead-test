<?php

namespace App\Livewire;

use App\Models\Approval;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingApproval extends Component
{
    public $note;

    public function approve($approvalID): void
    {
        $approval = Approval::findOrFail($approvalID);

        if ($approval->status !== 'pending') {
            session()->flash('error', 'This approval has already been processed.');
            return;
        }

        if ($approval->level > 1) {
            $previous = Approval::where('booking_id', $approval->booking_id)
                ->where('level', $approval->level - 1)
                ->first();

            if (!$previous || $previous->status !== 'approved') {
                session()->flash('error', 'Previous approval must be approved before this one.');
                return;
            }
        }

        $approval->update([
            'status' => 'approved',
            'note' => $this->note,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        session()->flash('success', 'Approval has been successfully processed.');
    }

    public function reject($approvalID): void
    {
        $approval = Approval::findOrFail($approvalID);

        if ($approval->status !== 'pending') {
            session()->flash('error', 'This approval has already been processed.');
            return;
        }

        $approval->update([
            'status' => 'rejected',
            'note' => $this->note,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        session()->flash('success', 'Approval has been successfully rejected.');

    }

    public function render()
    {
        $approval = Approval::with('booking.vehicle', 'booking.driver', 'booking.user')
            ->where('approver_id', Auth::id())
            ->where('status', 'pending')
            ->orderBy('level', 'asc')
            ->get();

        return view('livewire.booking-approval', [
            'approvals' => $approval,
        ]);
    }
}
