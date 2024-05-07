<?php

namespace App\Models\GluCare\Appointments;

use App\Models\GluCare\payment\Payment;
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
        'appointments_datetime',
        'note',
        'payment_status',
        'zoom_meeting_url',
        'duration_in_minute',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
