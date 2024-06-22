<?php

namespace App\Http\Controllers\Apis\GluCare\Detection\PredictDiabetes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictDiabetesController extends Controller
{
    public function predictDiabetesWithPatientData(Request $request)
    {
        $flaskApiUrl = "http://localhost:5000/predict_diabetes";

        try {
            // Get data from request
            $jsonData = $request->json()->all();

            // Send data to Flask API
            $response = Http::post($flaskApiUrl, $jsonData);

            // Check if response is successful
            if ($response->successful()) {
                $responseData = $response->json();

                // Check if prediction and type are present in response
                if (isset($responseData['prediction'], $responseData['type'])) {
                    $prediction = $responseData['prediction'];
                    $type = $responseData['type'];

                    return ['prediction' => $prediction, 'type' => $type];
                } else {
                    return ['error' => 'Failed to get prediction from Flask API'];
                }
            } else {
                return ['error' => 'Failed to communicate with Flask API'];
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
//
