<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_type',
        'location',
        'phone_number',
        'payment_info',
        'business_hours_open',
        'business_hours_close',
        'about',
        'social_media',
        'owner_id'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
