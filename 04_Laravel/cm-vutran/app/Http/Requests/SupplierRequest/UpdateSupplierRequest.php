<?php

namespace App\Http\Requests\SupplierRequest;

use Illuminate\Foundation\Http\FormRequest;

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
            'company_id' => 'required|string|size:3|unique:suppliers,company_id,'.$this->supplier,
            'company_name' => 'required|string|max:50',
            'transaction_name' => 'required|string|max:20',
            'address' => 'required|string|max:50',
            'email' => 'required|email|max:30|unique:suppliers,email,'.$this->supplier,
            'phone_number' => 'required|string|max:15',
            'fax' => 'required|string|max:15',
        ];
    }
}
