<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blood_group',
        'gender',
        'age',
        'weight',
        'phone',
        'email',
        'city',
        'province',
        'address',
        'last_donated',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'last_donated' => 'date',
            'age' => 'integer',
            'weight' => 'integer',
        ];
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeBloodGroup($query, $bloodGroup)
    {
        return $query->where('blood_group', $bloodGroup);
    }
}

