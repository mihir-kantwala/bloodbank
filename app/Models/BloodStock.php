<?php

namespace App\Models;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodStock extends Model
{
    use HasFactory;

    protected $fillable = ['hospital_id','blood_group','component','units_available'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}

