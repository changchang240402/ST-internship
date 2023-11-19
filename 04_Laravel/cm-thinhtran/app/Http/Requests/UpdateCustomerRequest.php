<?php

namespace App\Http\Requests;

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
            'transaction_name' => 'nullable|string|max:20',
            'address' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'email',
                'max:30',
                Rule::unique('customers')->ignore($this->id)
            ],
            'phone' => 'required|string|max:15',
            'fax' => 'nullable|string|max:15',
        ];
    }
}
