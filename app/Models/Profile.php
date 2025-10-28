<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'dob',
        'address',
        'city',
        'country',
        'zip',
        'profile_photo',
        'weight',
        'height',
        'allergies',
        'chronic_diseases',
        'medications',
        'past_surgeries',
        'last_donation_date',
        'total_donations',
        'preferred_center',
        'availability_status',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',
        'notification_method',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
