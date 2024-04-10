<?php

namespace App\Http\Controllers\Apis\Auth;
use App\Events\LoginEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\LoginRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiTrait;
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->errorMessage(['email' => 'User not found'], 'User not found', 404);
        }

        // Check Password
        if (!password_verify($request->password, $user->password)) {
            return $this->errorMessage(['password' => 'The provided credentials are incorrect'], 'Wrong Attempt', 401);
        }
        $user->token = "Bearer " . $user->createToken($request->device_name)->plainTextToken;

      //check verification
        if(is_null($user->email_verified_at)){
            return $this->data(compact('user'),'User Not Verified',401);
        }

        try{
            event(new LoginEvent($user));   //Mail Notification
        } catch(\Exception $e) {
            return ApiTrait::errorMessage([], $e->getMessage(), 500);
        }
               return$this->data(compact('user'), 'You Logged in Successfully.');
        }






    public function logout(Request $request){

       $user=Auth::guard('sanctum')->user();
        if (!$user) {
            return$this->errorMessage(['email' => 'User not found'], 'User not found', 404);
        }
      $user->currentAccessToken()->delete();      //Revoke Token

      //Notification mail
     // $user->notify(new LogoutNotification());
       return$this->successMessage('You have logged out successfully');
    }





    public function logoutAllDevices(){

       $user=Auth::guard('sanctum')->user(); //Currently Authenticated User
        if (!$user) {
            return $this->errorMessage(['email' => 'User not found'], 'User not found', 404);
        }
      $user->tokens()->delete();//Revoke Token

       return $this->successMessage('You have logged out successfully from all devices');


}
}
