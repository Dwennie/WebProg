<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'blood_group',
        'units',
        'urgency',
        'reason',
        'hospital_name',
        'ward',
        'city',
        'doctor',
        'contact_name',
        'relationship',
        'contact_phone',
        'contact_email',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'units' => 'integer',
        ];
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeUrgent($query)
    {
        return $query->whereIn('urgency', ['immediate', '24h']);
    }
}

