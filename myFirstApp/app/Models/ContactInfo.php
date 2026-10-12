<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'center_name',
        'facility_type',
        'coordinator',
        'address',
        'city',
        'province',
        'emergency_hotline',
        'phone',
        'email',
        'operating_hours',
    ];
}

