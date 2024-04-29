<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Events\Auth\RegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\RegisterRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    use ApiTrait;
     public function __invoke(RegisterRequest $request)
    {
         set_time_limit(300);
         $data=$request->safe()->except('password','password_confirmation');
         $data['password']=Hash::make($request->password);

       try{
        $user= User::create($data);
           event(new RegisterEvent($user));
       } catch(\Exception $e) {
           return ApiTrait::errorMessage([], $e->getMessage(), 500);
       }
        // Generate token
        $user->token= "Bearer ".$user->createToken($request->device_name)->plainTextToken;

        return $this->data(compact('user'), 'User Created Successfully', 201);

    }
  }
