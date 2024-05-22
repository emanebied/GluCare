<?php

//namespace App\Http\Controllers\Apis\Auth;
//
//use App\Events\Auth\RegisterEvent;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\Apis\Auth\RegisterRequest;
//use App\Http\traits\ApiTrait;
//use App\Models\User;
//use Illuminate\Support\Facades\Hash;
//
//class RegisterController extends Controller
//{
//
//    use ApiTrait;
//     public function __invoke(RegisterRequest $request)
//    {
//         set_time_limit(300);
//         $data=$request->safe()->except('password','password_confirmation');
//         $data['password']=Hash::make($request->password);
//
//       try{
//        $user= User::create($data);
//           event(new RegisterEvent($user));
//
//       } catch(\Exception $e) {
//           return ApiTrait::errorMessage([], $e->getMessage(), 500);
//       }
//        // Generate token
//        $user->token= "Bearer ".$user->createToken($request->device_name)->plainTextToken;
//
//        return $this->data(compact('user'), 'User Created Successfully', 201);
//
//    }
//  }





namespace App\Http\Controllers\Apis\Auth\Registration;

use App\Events\Auth\Registration\RegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\RegisterRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use ApiTrait;

    public function __invoke(RegisterRequest $request)
    {
        set_time_limit(300);
        $data = $request->safe()->except('password', 'password_confirmation');
        $data['password'] = Hash::make($request->password);

        try {
            $user = User::create($data);
            $user->assignRole('user');
            // Assign permissions based on user role if provided
            if ($request->has('role')) {
                $this->assignPermissions($user, $request->role);
            }

            event(new RegisterEvent($user));
        } catch (\Exception $e) {
            return ApiTrait::errorMessage([], $e->getMessage(), 500);
        }

        // Generate token
        $user->token = "Bearer " . $user->createToken($request->device_name)->plainTextToken;

        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'id' => $user->id,
            'token' => $user->token,
        ];

        return $this->data($userData, 'User Created Successfully', 201);
    }

    private function assignPermissions(User $user, ?string $roleName)
    {
        if ($roleName) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
