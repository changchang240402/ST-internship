<?php

namespace App\Http\Requests\Customers;

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
            'transaction_name' => 'required|string|max:30',
            'address' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:30',
                'unique:customers,email,' . $this->id . ',id'
            ],
            'phone' => 'required|string|regex:/^([0-9\-\+\(\)]*)$/|max:15',
            'fax' => 'required|string|max:15'
        ];
    }
}
