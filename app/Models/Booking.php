<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Approval;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'requested_by',
        'destination',
        'start_time',
        'end_time',
    ];
    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class);

    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);

    }
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');

    }
}
