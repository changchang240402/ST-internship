<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
            'phone' => [
                'required',
                'string',
                'max:15',
                'regex:/^\d{10,15}$/',
                Rule::unique('suppliers', 'phone')->ignore($this->input('supplier_id')),
            ],
            'fax' => 'nullable|string|max:15|regex:/^\d{10,15}$/',
            'email' => [
                'required',
                'string',
                'email',
                'max:30',
                Rule::unique('suppliers', 'email')->ignore($this->input('supplier_id')),
            ], 
        ];
    }
}
