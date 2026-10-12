<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirer extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_name',
        'category',
        'license_no',
        'contact_person',
        'designation',
        'phone',
        'email',
        'city',
        'province',
        'address',
        'total_requests',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'total_requests' => 'integer',
        ];
    }
}

