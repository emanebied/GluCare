<?php

namespace App\Models\GluCare\payment;

use App\Models\GluCare\Appointments\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'payment_method',
        'amount',
        'currency',
        'status',
        'transaction_id',
        'transaction_data'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }


}
