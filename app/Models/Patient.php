<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
     use Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'contact',
        'email',
        'gender',
        'age',
        'blood_group',
        'state',
        'district',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
