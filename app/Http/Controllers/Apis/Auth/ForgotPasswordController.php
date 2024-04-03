<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\ForgotPasswordRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request){

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return ApiTrait::errorMessage(['email' => 'User not found'], 'User not found', 404);
        }
        //Generate token
        $user->token = "Bearer " . $user->createToken($request->device_name)->plainTextToken;
        return ApiTrait::data(compact('user'), 'Mail Valid');



    }
}
