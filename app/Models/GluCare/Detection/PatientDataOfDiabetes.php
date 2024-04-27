<?php

namespace App\Models\GluCare\Detection;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientDataOfDiabetes extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable =[
        'user_id',
        'gender',
        'age',
        'hypertension',
        'heart_disease',
        'smoking_history',
        'height',
        'weight',
        'HbA1c_level',
        'blood_glucose_level',
        'bmi',

    ];



    public function user(){
        return $this->belongsTo(User::class)->select('id','name','email');
    }














}
