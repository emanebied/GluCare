<?php

namespace App\Models\GluCare\Appointments;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'specialization',
        'doctor_name',
        'status',
        'appointments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
