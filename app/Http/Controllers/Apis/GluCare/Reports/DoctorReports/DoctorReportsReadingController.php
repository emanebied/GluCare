<?php

namespace App\Http\Controllers\Apis\GluCare\Reports\DoctorReports;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\Appointments\Appointment;
use App\Models\GluCare\payment\Payment;
use Carbon\Carbon;

class DoctorReportsReadingController extends Controller
{
    use ApiTrait,AuthorizeCheckTrait;
    public function getTodayAppointments()
    {
        $this->authorizeCheck('today_appointments_reports');

        // Retrieve appointments and their datetime for today
        $appointments = Appointment::whereDate('appointment_datetime', Carbon::today())
            ->select('appointment_datetime')
            ->get();

        $appointmentCount = $appointments->count();
        return $this->data(compact('appointmentCount'), 'Today Appointments');

    }

    public function getMoneyTransfers()
    {
        $this->authorizeCheck('money_transfers_reports');

        $totalMoney = Payment::where('status', 'paid')->sum('amount');
        return $this->data(compact('totalMoney'), 'Total Money Transfers');
    }

    public function getTotalPatients()
    {
        $this->authorizeCheck('total_patients_reports');

        $totalPatients = Appointment::where('status', 'approved')->count();
        return $this->data(compact('totalPatients'), 'Total Patients');
    }
}
