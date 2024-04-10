<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'age',
        'phone_number',
        'hospital_id',
        'photo'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
