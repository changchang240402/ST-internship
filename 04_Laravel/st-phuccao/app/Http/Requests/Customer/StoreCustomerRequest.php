<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'company_name' => 'required|string|max:50',
            'transaction_name' => 'required|string|max:20',
            'address' => 'required|string|max:50',
            'email' => 'required|string|email|max:30|unique:customers', 
            'phone' => 'required|string|max:15|unique:customers|regex:/^\d{10,15}$/',
            'fax' => 'nullable|string|max:15|regex:/^\d{10,15}$/',
        ];
    }
}
