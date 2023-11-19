<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:customers,id|integer',
            'company_name' => 'required|string|max:50',
            'transaction_name' => 'required|string|max:50|unique:customers,transaction_name,' . $this->id,
            'address' => 'required|string|max:50',
            'email' => 'required|email|unique:customers,email,' . $this->id,
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15|unique:customers,phone,' . $this->id,
            'fax' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15|unique:customers,fax,' . $this->id,
        ];
    }
}
