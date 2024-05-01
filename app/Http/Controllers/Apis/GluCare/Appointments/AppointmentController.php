<?php

namespace App\Http\Controllers\Apis\GluCare\Appointments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\Appointments\AppointmentStoreRequest;
use App\Http\Requests\Apis\GluCare\Appointments\AppointmentUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{

    use ApiTrait,AuthorizeCheckTrait;

        public function index()
        {
            $this->authorizeCheck('appointments_view');
            $appointments = Appointment::all();
            return $this->data(compact('appointments'),'Appointments fetched successfully');
        }


        public  function create(){

            $this->authorizeCheck('appointments_create');
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
                'user_id' => $user->id,
                'user_name'=> $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
            ]);
            $appointment = Appointment::create($request->all());

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

            return $this->data(compact('appointment', 'specializations', 'doctors'));
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

}
