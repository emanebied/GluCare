<?php

namespace App\Http\Controllers\Apis\GluCare\ActivityRecommendation;

use App\Http\Controllers\Controller;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\ActivityRecommendation\UserActivityLike;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;
use Illuminate\Support\Facades\Http;

class ActivityRecommendaionController extends Controller
{
    use AuthorizeCheckTrait;
    public function getPatientData($id){

        $this->authorizeCheck('PatientDataOfDiabetes_view');

        try {
            // Fetch patient data
            $patientData = PatientDataOfDiabetes::where('user_id', $id)
                ->select('user_id', 'blood_glucose_level', 'bmi', 'diabetes_type')
                ->first();

            if (!$patientData) {
                return response()->json(['error' => 'Patient data not found'], 404);
            }

            // Fetch favorite activities for the patient
            $favoriteActivity = UserActivityLike::where('user_id', $id)
                ->where('like_status', 1)
                ->pluck('favorite_activity');

            $patientData->favorite_activity = $favoriteActivity;

            return response()->json($patientData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving patient data: ' . $e->getMessage()], 500);
        }

    }

    public function recommend($id)
    {
        $this->authorizeCheck('recommend');
        try {
            // Fetch patient data including favorite activities
            $patientData = $this->getPatientData($id)->getData(true);

            if (isset($patientData['error'])) {
                return response()->json(['error' => 'Patient data not found'], 404);
            }

            // Fetch recommendations from external service
            $response = Http::get('http://127.0.0.1:5000/recommend', [
                'user' => $patientData,
            ]);

            if (!$response->successful()) {
                return response()->json(['error' => 'Failed to fetch recommendations'], $response->status());
            }

            $recommendations = $response->json();

            return response()->json([
                'patient_data' => $patientData,
                'recommendations' => $recommendations,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving recommendations: ' . $e->getMessage()], 500);
        }
    }

}
