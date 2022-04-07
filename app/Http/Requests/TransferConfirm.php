<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferConfirm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'receiver_phone' => 'required',
            'amount' => 'required|min:1000|integer',
        ];
    }

    public function messages()
    {
        return [
            'receiver_phone.required' => 'Please fill phone number.',
            'amount.required' => 'Please fill amount to transfer.',
            'amount.min' => 'Minimum amount is 1000 MMK.'
        ];
    }
}
