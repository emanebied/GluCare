<?php
namespace App\Http\traits;


use App\Events\Auth\ForgotPassword\PasswordResetCodeEvent;
use App\Events\Auth\Registration\EmailVerificationCodeEvent;
use App\Http\Requests\Apis\Auth\CheckCodeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HandlesVerificationCode {
 use ApiTrait;
    public function generateAndSendVerificationCode(User $user, $action = 'verification') {
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
        } catch(\Exception $e) {
            return ApiTrait::errorMessage([], $e->getMessage(), 500);
        }
        return $this->data(compact('user'), 'Code Sent Successfully.');
    }



    public function CheckCode(CheckCodeRequest $request)
    {
        $now = date('Y-m-d H:i:s');

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return $this->errorMessage([], 'User not authenticated', 401);
        }

        if ($user->code != $request->code) {
            return $this->data(compact('user'), 'Code Invalid',422);
        }
        if ($user->code_expired_at < $now) {

            return $this->data(compact('user'), 'Code Expired',422);

        } else {

            $user->email_verified_at = $now;
            $user->save();
            return $this->data(compact('user'), 'Correct Code');
        }
    }

}

