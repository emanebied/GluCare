<?php

namespace App\Http\Requests\Apis\GluCare\Payment;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('payment_create')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }


    public function rules()
    {
        return [

            'payment_method' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'card_number' => ['required', 'string', 'regex:/^\d{16}$/'], // should be a 16-digit string
            'exp_month' => ['required', 'integer', 'digits_between:1,2', 'min:1', 'max:12'],// an integer between 1 and 12
            'exp_year' => ['required', 'integer', 'digits:4'],
            'cvc' => ['required', 'string', 'regex:/^\d{3,4}$/'], //  should be a 3 or 4-digit string
        ];

    }
}
