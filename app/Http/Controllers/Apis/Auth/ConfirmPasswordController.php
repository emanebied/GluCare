<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Auth\CheckCodeRequest;
use App\Http\traits\ApiTrait;
use App\Models\User;
use App\Notifications\Auth\ConfirmPasswordNotification;
use App\Notifications\Auth\EmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    private function generateAndSendVerificationCode($user, $token) {

        $code = rand(10000, 99999);
        $code_expired_at = now()->addSeconds(config('auth.code_timeout'));

        // Update user with new code and expiration
        $user->code = $code;
        $user->code_expired_at = $code_expired_at;
        $user->save();


//        try {
//            $user->notify(new EmailVerificationNotification($user));
//        } catch (\Exception $e) {
//            return ApiTrait::errorMessage(['mail' => $e->getMessage()], 'An error occurred while sending the email notification. Please try again.', 500);
//        }

        $user->token = $token;
        return ApiTrait::data(compact('user'), 'Code sent successfully. Please check your email.');
    }

    public function sendCode(Request $request)
    {
        $token = $request->header('Authorization');

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return ApiTrait::errorMessage([], 'User not authenticated', 401);
        }

        return $this->generateAndSendVerificationCode($user, $token);
    }


    public function resendCode(Request $request) {
        $token = $request->header('Authorization');

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return ApiTrait::errorMessage([], 'No unverified user found with this email.', 404);
        }

        return $this->generateAndSendVerificationCode($user, $token);
    }


    public function CheckCode(CheckCodeRequest $request)
    {
        $now = date('Y-m-d H:i:s');
        $token = $request->header('Authorization');

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return ApiTrait::errorMessage([], 'User not authenticated', 401);
        }

        if ($user->code != $request->code) {
            $user->token = $token;
            return ApiTrait::data(compact('user'), 'Code Invalid',422);
        }
        if ($user->code_expired_at < $now) {
            $user->token = $token;
            return ApiTrait::data(compact('user'), 'Code Expired',422);

        } else {

            $user->email_verified_at = $now;
            $user->save();

            $user->token = $token;
            return ApiTrait::data(compact('user'), 'Correct Code');
        }
    }

}
