<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\RegisterRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use App\Notifications\Auth\EmailVerificationNotification;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
     public function __invoke(RegisterRequest $request)
    {
         $data=$request->safe()->except('password','password_confirmation');
         $data['password']=Hash::make($request->password);

       try{
        $user= User::create($data);
       }catch(\Exception $e){
          return ApiTrait::errorMessage([],'Some thing went wrong',500);
       }

        // Generate token
        $user->token= "Bearer ".$user->createToken($request->device_name)->plainTextToken;

        return ApiTrait::data(compact('user'), 'User Created Successfully', 201);

    }
  }
