<?php

namespace App\Http\Controllers\Apis\Auth\ForgotPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\ForgotPasswordRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use ApiTrait;
    public function forgotPassword(ForgotPasswordRequest $request){

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->errorMessage(['email' => 'User not found'], 'User not found', 404);
        }
        //Generate token
        $user->token = "Bearer " . $user->createToken($request->device_name)->plainTextToken;
        return $this->data(compact('user'), 'Mail Valid');



    }
}
