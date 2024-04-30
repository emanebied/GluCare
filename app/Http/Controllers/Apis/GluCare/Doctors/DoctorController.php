<?php

namespace App\Http\Controllers\Apis\GluCare\Doctors;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
  use ApiTrait ,AuthorizeCheckTrait;

    public function index()
    {
        $this->authorizeCheck('doctors_view');
        $doctors = User::where('role', 'doctor')
            ->get(['id','name','image' ,'email','phone','status','specialization','experience_years','qualifications']);

        return $this->data(compact('doctors'),'Doctors List');

    }

    public function show($id)
    {
        $this->authorizeCheck('doctors_show');
        $doctor = User::where('role', 'doctor')
            ->where('id', $id)
            ->first(['name','image' ,'email','phone','status','specialization','experience_years','qualifications']);

        return $this->data(compact('doctor'),'Doctor Details');
    }

}
