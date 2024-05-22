<?php

namespace App\Http\Controllers\Apis\Auth\ForgotPassword;
use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use App\Http\traits\HandlesVerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConfirmPasswordController extends Controller
{

    use ApiTrait,HandlesVerificationCode;
    private function handleCodeSending(Request $request, bool $isResend)
    {
        $user = Auth::guard('sanctum')->user();
        $errorMsg = $isResend ? 'No unverified user found with this email.' : 'User not authenticated';
        $errorCode = $isResend ? 404 : 401;

        if (!$user) {
            return $this->errorMessage([], $errorMsg, $errorCode);
        }

        try {
            $this->generateAndSendVerificationCode($user,'password_reset');
            $userData = [
                'code' => $user->code,
            ];
            return $this->data($userData, 'code sent successfully. Please check your email.');

        } catch (\Exception $e) {
            return $this->errorMessage(['mail' => $e->getMessage()], 'An error occurred while sending the email notification. Please try again.', 500);
        }
    }
    public function sendCode(Request $request)
    {
        return $this->handleCodeSending($request, false);
    }

    public function resendCode(Request $request)
    {
        return $this->handleCodeSending($request, true);
    }
}
