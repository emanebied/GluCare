<?php

namespace App\Http\Controllers\Apis\GluCare\Reports\PatientReports;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;

class PatientReportsReadingController extends Controller
{
    use ApiTrait, AuthorizeCheckTrait;
    public function getBloodGlucoseLevels( $patientId)
    {
        $this->authorizeCheck('glucose-readings');

        $bloodGlucoseLevels = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('blood_glucose_level');
        if ($bloodGlucoseLevels->isEmpty()) {
            return $this->data([], 'No blood glucose levels available.');
        }
        return $this->data(compact('bloodGlucoseLevels'), 'Blood glucose levels retrieved successfully');

    }

    public function getAge($patientId)
    {
        $this->authorizeCheck( 'age_readings');

        $age = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('age');
        if ($age->isEmpty()) {
            return $this->data([], 'No age available.');
        }
        return $this->data(compact('age'), 'Age retrieved successfully');
    }

    public function getHypertension($patientId)
    {
        $this->authorizeCheck('hypertension_readings');

        $hypertension = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('hypertension');
        if ($hypertension->isEmpty()) {
            return $this->data([], 'No hypertension available.');
        }
        return $this->data(compact('hypertension'), 'Hypertension retrieved successfully');
    }

    public function getHeartDisease($patientId)
    {
        $this->authorizeCheck('heart-disease-readings');

        $heartDisease = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('heart_disease');
        if ($heartDisease->isEmpty()) {
            return $this->data([], 'No heart disease available.');
        }
        return $this->data(compact('heartDisease'), 'Heart disease retrieved successfully');
    }

    public function getSmokingHistory($patientId)
    {
        $this->authorizeCheck('smoking-history-readings');

        $smokingHistory = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('smoking_history');
        if ($smokingHistory->isEmpty()) {
            return $this->data([], 'No smoking history available.');
        }
        return $this->data(compact('smokingHistory'), 'Smoking history retrieved successfully');
    }


    public function getHbA1cLevel($patientId)
    {
        $this->authorizeCheck('HbA1c_level_readings');

        $HbA1cLevel = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('HbA1c_level');
        if ($HbA1cLevel->isEmpty()) {
            return $this->data([], 'No HbA1c level available.');
        }
        return $this->data(compact('HbA1cLevel'), 'HbA1c level retrieved successfully');
    }


    public function getBMI($patientId)
    {
        $this->authorizeCheck('bmi_readings');

        $bmi = PatientDataOfDiabetes::where('user_id', $patientId)->pluck('bmi');
        if ($bmi->isEmpty()) {
            return $this->data([], 'No BMI available.');
        }
        return $this->data(compact('bmi'), 'BMI retrieved successfully');
    }

}
