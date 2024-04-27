<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\PatientDataOfDiabetes;

class PatientController extends Controller
{
    use ApiTrait,AuthorizeCheckTrait;

        public function index()
        {
            $this->authorizeCheck('PatientDataOfDiabetes_view');

            $patientData = PatientDataOfDiabetes::with('user')->get();

            if ($patientData->isEmpty()) {
                return $this->data([], 'No patient data available.');
            }

            return $this->data(compact('patientData'), 'Patient data retrieved successfully');
        }


        private function calculateBMI($height, $weight)
        {
            // BMI formula: weight (kg) / (height (m) * height (m))
            $heightInMeters = $height / 100; // Convert height from cm to meters
            $bmi = $weight / ($heightInMeters * $heightInMeters);
            $formattedBMI = number_format($bmi, 1);
            return $formattedBMI;
        }



        public function store(PatientStoreRequest $request)
        {
            $userId = $request->user()->id;
            $bmi = $this->calculateBMI($request->post('height'), $request->post('weight'));

            // Check if similar data already exists for the user
            $existingData = PatientDataOfDiabetes::where('user_id', $userId)
                ->where('bmi', $bmi)
                ->first();

            // If similar data exists, return an error response
            if ($existingData) {
                return $this->errorMessage([], 'Similar patient data already exists.', 400);
            }

            $request->merge([
                'user_id' => $userId,
                'bmi' => $bmi,
            ]);

            $PatientDataOfDiabetes = PatientDataOfDiabetes::create($request->all());

            return $this->data(compact('PatientDataOfDiabetes'), 'Patient data added successfully');
        }


        public function show($id)
        {
            $this->authorizeCheck('PatientDataOfDiabetes_show');
            $patient = PatientDataOfDiabetes::with('user')->findOrFail($id);
            return $this->data(compact('patient'), 'Patient data retrieved successfully');

        }

        public function update(PatientUpdateRequest $request, $id)
        {
            $patient = PatientDataOfDiabetes::findOrFail($id);
            $request->merge([
                'user_id' => $request->user()->id,
            ]);

            $bmi = $this->calculateBMI($request->post('height'), $request->post('weight'));
            $patient->update($request->all() + ['bmi' => $bmi]);

            return $this->data(compact('patient'), 'Patient data updated successfully');
        }


        public function destroy($id)
        {
            $this->authorizeCheck('PatientDataOfDiabetes_delete');
            $patient = PatientDataOfDiabetes::findOrFail($id);
            $patient->delete();
            return $this->successMessage('Patient data deleted successfully');
        }


}
