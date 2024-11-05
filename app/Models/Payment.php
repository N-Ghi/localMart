<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'price',
        'booking_id',
        'status',
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
