<?php
namespace App\Http\Traits;

use App\Events\Auth\ForgotPassword\PasswordResetCodeEvent;
use App\Events\Auth\Registration\EmailVerificationCodeEvent;
use App\Http\Requests\Apis\Auth\CheckCodeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HandlesVerificationCode
{
    use ApiTrait;

    public function generateAndSendVerificationCode(User $user, $action = 'verification')
    {
        $code = rand(10000, 99999);
        $codeExpiredAt = now()->addSeconds(config('auth.code_timeout'));

        $user->code = $code;
        $user->code_expired_at = $codeExpiredAt;

        try {
            $user->save();

            if ($action === 'verification') {
                event(new EmailVerificationCodeEvent($user)); // Mail Notification for verification
            } elseif ($action === 'password_reset') {
                event(new PasswordResetCodeEvent($user)); // Mail Notification for password reset
            } else {
                throw new \InvalidArgumentException("Invalid action specified.");
            }
        } catch (\Exception $e) {
            return $this->errorMessage([], $e->getMessage(), 500);
        }

        return $this->successMessage('Code Sent Successfully');
    }

    public function checkCode(CheckCodeRequest $request)
    {
        $now = now();

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return $this->errorMessage([], 'User not authenticated', 401);
        }

        if ($user->code != $request->code) {
            return $this->errorMessage([], 'Invalid Code', 422);
        }

        if ($user->code_expired_at < $now) {
            return $this->errorMessage([], 'Code Expired', 422);
        }

        $user->email_verified_at = $now;
        $user->save();
        return $this->successMessage('Code Verified Successfully');
    }
}


