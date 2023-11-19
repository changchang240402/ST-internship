<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'company_name' => 'required|string|max:50',
            'transaction_name' => 'required|string|max:20',
            'address' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:30',
                'unique:customers,email,' . $this->customer . ',id'
            ],
            'phone' => 'required|string|regex:/^([0-9\-\+\(\)]*)$/|max:15',
            'fax' => 'required|string|max:15',
        ];
    }
}
