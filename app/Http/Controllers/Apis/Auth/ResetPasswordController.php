<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\ResetPasswordRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ApiTrait;
    public function resetPassword(ResetPasswordRequest $request)
    {
        $user= Auth::guard('sanctum')->user();
        if (!$user) {
            return ApiTrait::errorMessage([], 'User not authenticated', 401);
        }

        $user->password = Hash::make($request->password);
        $user->save();

            return $this->successMessage('Password Updated Successfully');
        }

}
