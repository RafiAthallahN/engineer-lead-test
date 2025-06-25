<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'booking_id',
        'approver_id',
        'level',
        'status',
        'note',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()  
    {
        return $this->belongsTo(User::class);
    }
}
