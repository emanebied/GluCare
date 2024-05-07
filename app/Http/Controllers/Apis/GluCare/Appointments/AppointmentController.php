<?php

namespace App\Http\Controllers\Apis\GluCare\Appointments;

use App\Events\GluCare\Appointments\AppointmentEvent;
use App\Http\Controllers\Apis\GluCare\ZoomVideoCall\ZoomController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\Appointments\AppointmentStoreRequest;
use App\Http\Requests\Apis\GluCare\Appointments\AppointmentUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\Appointments\Appointment;
use App\Models\User;
use App\Notifications\GluCare\Appointments\AppointmentConfirmationNotification;
use App\Notifications\GluCare\Appointments\AppointmentCreated;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    use ApiTrait , AuthorizeCheckTrait;

    public function index()
    {
        $this->AuthorizeCheck('appointments_view');
        $appointments = Appointment::all();

        if ($appointments->isEmpty()) {
            return $this->errorMessage([],'No appointments found', 404);
        }

        return $this->data(compact('appointments'), 'Appointments fetched successfully');
    }



    public  function create(){

            $this->AuthorizeCheck('appointments_create');

            $specializations = User::where('role', 'doctor')
                ->select('specialization')
                ->distinct() // Get unique specializations
                ->get();

            $doctors = User::where('role', 'doctor')
                ->select('name')
                ->get();


            return $this->data(compact('specializations', 'doctors'));

        }

    public function store(AppointmentStoreRequest $request)
    {
        // Check if the user already has an appointment with the same doctor and datetime
        $existingAppointment = Appointment::where('user_id', $request->user()->id)
            ->where('doctor_name', $request->doctor_name)
            ->where('specialization', $request->specialization)
            ->first();

        if ($existingAppointment) {
            $errorMessage = "You already have an appointment with {$request->doctor_name}";
            return $this->errorMessage(['error' => $errorMessage], $errorMessage);
        }

        // If no existing appointment found, proceed to create a new one
        $user = User::where('name', $request->doctor_name)
            ->where('specialization', $request->specialization)
            ->first();

        if (!$user) {
            $errorMessage = "Doctor not found for specialization: {$request->specialization}, and doctor name: {$request->doctor_name}";
            return $this->errorMessage(['error' => $errorMessage], $errorMessage);
        }

        $request->merge([
            'user_id' =>  $request->user()->id,
            'name'=> $request->user()->name,
            'email' =>$request->user()->email,
            'phone' => $request->user()->phone,
        ]);

        $appointment = Appointment::create($request->all());

        try {
            event(new AppointmentEvent($user)); // Dispatch AppointmentEvent
        } catch (\Exception $e) {
            return $this->errorMessage([], $e->getMessage(), 500);
        }

        //send notification to doctor role
        $doctor = User::where('role', 'doctor')->first();
        $doctor->notify(new AppointmentCreated($doctor));

        return $this->data(compact('appointment'),'Appointment created successfully');
    }

    public function approve(Request $request, $id)
    {
        $this->authorizeCheck('appointments_approve');

        $appointment = Appointment::findOrFail($id);

        // Update appointment status, datetime and duration
        $appointment->status = 'approved';
        $appointment->appointment_datetime = $request->appointment_datetime;
        $appointment->duration_in_minute = $request->duration_in_minute;

        // Generate Zoom meeting link
        $zoomController = new ZoomController();
        $zoomMeetingData = [
            'title' => 'Appointment with ' . $appointment->doctor_name,
            'start_date_time' => $appointment->appointment_datetime,
            'duration_in_minute' => $appointment->duration_in_minute,
        ];

        try {
            $zoomMeetingUrl = $zoomController->createMeeting($zoomMeetingData);
            $appointment->zoom_meeting_url = $zoomMeetingUrl;
            $appointment->save();

            // Send appointment confirmation notification with details including Zoom meeting URL
            $user = User::where('id', $appointment->user_id)->first();
            $user->notify(new AppointmentConfirmationNotification($user));

            return $this->successMessage('Appointment approved successfully.');
        } catch (\Exception $e) {
            // Handle error if Zoom meeting creation fails
            return $this->errorMessage([], 'Failed to approve appointment. Error: ' . $e->getMessage());
        }
    }


    public function cancel($id)
    {
        $this->authorizeCheck('appointments_cancel');
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return $this->successMessage('Appointment cancelled successfully. Appointment date and time: ' . $appointment->appointment_datetime);
    }





    public function show($id)
        {
            $this->authorizeCheck('appointments_view');
            $appointment = Appointment::findOrFail($id);
            return $this->data(compact('appointment'), 'Appointment fetched successfully');
        }


        public function edit($id)
        {
            $this->authorizeCheck('appointments_edit');
            $appointment = Appointment::findOrFail($id);
            $specializations = User::where('role', 'doctor')
                ->select('specialization')
                ->distinct() // Get unique specializations
                ->get();

            $doctors = User::where('role', 'doctor')
                ->select('name')
                ->get();

            return $this->data(compact('appointment', 'specializations', 'doctors'));
        }


    public function update(AppointmentUpdateRequest $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $user = User::where('name', $request->doctor_name)
            ->where('specialization', $request->specialization)
            ->first();

        if (!$user) {
            $errorMessage = "Doctor not found for specialization: {$request->specialization}, and doctor name: {$request->doctor_name}";
            return $this->errorMessage(['error' => $errorMessage], $errorMessage);
        }

        // Check if the updated appointment conflicts with any existing appointment
        $existingAppointment = Appointment::where('id', '!=', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingAppointment) {
            $errorMessage = "You already have an appointment with {$request->doctor_name}";
            return $this->errorMessage(['error' => $errorMessage], $errorMessage);
        }

        $request->merge([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);

        $appointment->update($request->all());

        return $this->data(compact('appointment'), 'Appointment updated successfully');
    }


    public function destroy($id)
        {
            $this->authorizeCheck('appointments_delete');
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();

            return $this->successMessage('Appointment deleted successfully');
        }

}

