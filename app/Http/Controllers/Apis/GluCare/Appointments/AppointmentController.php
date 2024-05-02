<?php

namespace App\Http\Controllers\Apis\GluCare\Appointments;

use App\Events\GluCare\Appointments\AppointmentEvent;
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

            $appointments= User::where('role', 'doctor')
                ->select('appointments')
                ->get();

            return $this->data(compact('specializations', 'doctors','appointments'));

        }

        public function store(AppointmentStoreRequest $request)
        {
//            $user = $request->user();

            $user = User::where('name', $request->doctor_name)
                ->where('specialization', $request->specialization)
                ->first();

            if (!$user) {
                $errorMessage = "Doctor not found for specialization: {$request->specialization}, and doctor name: {$request->doctor_name}";
                return $this->errorMessage(['error' => $errorMessage], $errorMessage);
            }

            // Check if appointment already exists for this user
            $existingAppointment = Appointment::where('user_id', $user->id)
                ->first();

            if ($existingAppointment) {
                return $this->errorMessage([],'Appointment already exists');
            }

            $request->merge([
                'user_id' =>  $request->user()->id,
                'name'=> $request->user()->name,
                'email' =>$request->user()->email,
                'phone' => $request->user()->phone,
            ]);

            $appointment = Appointment::create($request->all());

            // Send notification to the authenticated user
//            $user->notify(new AppointmentCreated($user));
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

            $appointments= User::where('role', 'doctor')
                ->select('appointments')
                ->get();

            return $this->data(compact('appointment', 'specializations', 'doctors','appointments' ));
        }


        public function update(AppointmentUpdateRequest $request, $id)
        {
//            $user = $request->user();
            $appointment = Appointment::findOrFail($id);

            $user = User::where('name', $request->doctor_name)
                ->where('specialization', $request->specialization)
                ->first();


            if (!$user) {
                $errorMessage = "Doctor not found for specialization: {$request->specialization}, and doctor name: {$request->doctor_name}";
                return $this->errorMessage(['error' => $errorMessage], $errorMessage);
            }

            $request->merge([
                'user_id' => $user->id,
                'user_name'=> $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
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
    public function approve(Request $request, $id)
    {
        $this->authorizeCheck('appointments_approve');

        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'approved';

        // Update appointment datetime if provided in the request
        if ($request->has('appointments')) {
            $appointment->appointments = $request->appointments;
        }
        // Save the changes to the appointment
        $appointment->save();

     // sending notifications to the user using event


        $user = User::where('id', $appointment->user_id)->first();
        $user->notify(new AppointmentConfirmationNotification($user));

        return $this->successMessage('Appointment approved successfully. Appointment date and time: ' . $appointment->appointments);

    }

    public function cancel($id)
        {
            $this->authorizeCheck('appointments_cancel');
            $appointment = Appointment::findOrFail($id);
            $appointment->status = 'cancelled';
            $appointment->save();

            // Additional actions, such as sending notifications, logging, etc., can be performed here.

            return $this->successMessage('Appointment cancelled successfully. Appointment date and time: ' . $appointment->appointment_datetime);
        }

}
