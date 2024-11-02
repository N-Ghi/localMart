<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'start_time',
        'finish_time',
        'owner_id',
    ];
    public function owned()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
