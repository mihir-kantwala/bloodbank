<?php
namespace App\Models;

use App\Models\BloodStock;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hospital extends Authenticatable
{
    use Notifiable;

    protected $guard = 'hospital';

    protected $fillable = [
        'name','category','email','password','contact','alternate_number','address',
        'state','city','zip','license_number','website','from_date','to_date','verified'
    ];

    protected $hidden = ['password'];

    public function bloodStocks()
{
    return $this->hasMany(BloodStock::class);
}


}

