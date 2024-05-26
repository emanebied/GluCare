<?php

namespace App\Http\Controllers\Apis\GluCare\Detection\PatientData;

use App\Events\GluCare\Detection\PatientDataAddedEvent;
use App\Http\Controllers\Apis\GluCare\Detection\PredictDiabetes\PredictDiabetesController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\Detection\PatientStoreRequest;
use App\Http\Requests\Apis\GluCare\Detection\PatientUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;

class PatientDataController extends Controller
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
        $user = $request->user();
        $userId = $user->id;
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

        try {
            // Call the predictDiabetesWithPatientData method from PredictDiabetesController
            $predictDiabetesController = new PredictDiabetesController();
            $predictionResponse = $predictDiabetesController->predictDiabetesWithPatientData($request);

            // Check if prediction was successful
            if (isset($predictionResponse['prediction'], $predictionResponse['type'])) {
                $prediction = $predictionResponse['prediction'];
                $type = $predictionResponse['type'];

                // Dispatch an event to notify the user that patient data has been added
                event(new PatientDataAddedEvent($user, $PatientDataOfDiabetes, $prediction, $type));
                return $this->data(compact('PatientDataOfDiabetes', 'prediction', 'type'), 'Patient data added successfully');
            } else {
                return $this->errorMessage([], 'Failed to predict diabetes.', 500);
            }
        } catch (\Exception $e) {
            return $this->errorMessage([], $e->getMessage(), 500);
        }
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

        // Get the original height and weight before updating
        $originalHeight = $patient->height;
        $originalWeight = $patient->weight;

        // Update patient data
        $request->merge([
            'user_id' => $request->user()->id,
        ]);

        $patient->update($request->all());

        // Calculate BMI using updated height and weight
        $bmi = $this->calculateBMI($request->post('height'), $request->post('weight'));
        $patient->update(['bmi' => $bmi]);

        // If height or weight has changed, update prediction
        if ($originalHeight != $request->post('height') || $originalWeight != $request->post('weight')) {
            try {
                // Call the predictDiabetesWithPatientData method from PredictDiabetesController
                $predictDiabetesController = new PredictDiabetesController();
                $predictionResponse = $predictDiabetesController->predictDiabetesWithPatientData($request);

                if (isset($predictionResponse['prediction'], $predictionResponse['type'])) {
                    $prediction = $predictionResponse['prediction'];
                    $type = $predictionResponse['type'];

                    return $this->data(compact('patient', 'prediction', 'type'), 'Patient data updated successfully');
                } else {
                    return $this->errorMessage([], 'Failed to predict diabetes.', 500);
                }
            } catch (\Exception $e) {
                return $this->errorMessage([], $e->getMessage(), 500);
            }
        }
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
