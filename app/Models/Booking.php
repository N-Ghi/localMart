<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booked_by',
        'service_id',
        'booked_time',
        'status',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
