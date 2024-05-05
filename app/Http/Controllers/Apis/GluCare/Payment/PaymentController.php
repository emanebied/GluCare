<?php

namespace App\Http\Controllers\Apis\GluCare\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\Payment\StorePaymentRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\User;
use App\Notifications\GluCare\Payments\PaymentStatusNotification;
use Exception;
use Stripe\Stripe;


class PaymentController extends Controller
{
    use AuthorizeCheckTrait, ApiTrait;

    private function createStripePayment($appointment, $request)
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));

        // Get the doctor's amount and currency
        $doctorAmount  = User::where('role', 'doctor')
            ->where('name', $appointment->doctor_name)->pluck('amount')->first();

        $currency = User::where('role', 'doctor')
            ->where('name', $appointment->doctor_name)->pluck('currency')->first();



        $stripePayment = \Stripe\PaymentIntent::create([
            'amount' => $doctorAmount, // Use the doctor's amount
            'currency' => $currency,
            'payment_method' => $request->payment_method,
            'confirm' => true,
            'description' => 'Payment for appointment',
            'receipt_email' => auth()->user()->email,
            'return_url' => 'https://glucare.com/payment/success',
        ]);

        return $stripePayment->id;
    }

    private function processPayment($appointment, $request)
    {
        // Get the doctor's amount and currency
        $doctorAmount  = User::where('role', 'doctor')
            ->where('name', $appointment->doctor_name)->pluck('amount')->first();

        $currency = User::where('role', 'doctor')
            ->where('name', $appointment->doctor_name)->pluck('currency')->first();


        // Proceed with payment processing
        $paymentIntent = $this->createStripePayment($appointment, $request);
        $transactionData = json_encode($paymentIntent);

        $payment = $appointment->payments()->create([
            'payment_method' => $request->payment_method,
            'amount' => $doctorAmount,
            'currency' => $currency,
            'status' => 'paid',
            'name' => $request->name,
            'card_number' => $request->card_number,
            'exp_month' => $request->exp_month,
            'exp_year' => $request->exp_year,
            'cvc' => $request->cvc,
            'transaction_id' => $this->createStripePayment($appointment, $request),
            'transaction_data' => $transactionData,
        ]);

        return $payment;
    }



    public function stripePayment(StorePaymentRequest $request)
    {
        $this->authorizeCheck('payment_create');

        try {
            $user = auth()->user();

            $appointment = $user->appointments()->where('status', 'approved')->first();
            if (!$appointment) {
                return $this->errorMessage(['error' => 'No approved appointment found'], 'No approved appointment found');
            }

            $payment = $this->processPayment($appointment, $request);

            $appointment->update(['payment_status' => 'paid']);

            $user->notify(new PaymentStatusNotification($payment));

            return $this->data(compact('payment'), 'Payment done successfully');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return $this->errorMessage(['error' => $e->getMessage()], 'Payment failed');
        } catch (Exception $e) {
            return $this->errorMessage(['error' => $e->getMessage()], 'Payment failed');
        }
    }


}





