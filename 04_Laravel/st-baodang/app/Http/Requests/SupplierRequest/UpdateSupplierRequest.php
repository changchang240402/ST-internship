<?php

namespace App\Http\Requests\SupplierRequest;

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
            'id' => 'required|exists:suppliers,id|integer',
            'company_id' => [
                'required',
                'string',
                'size:3',
                Rule::unique('suppliers')->ignore($this->id)
            ],
            'company_name' => 'required|string|max:50',
            'transaction_name' => 'required|string|max:20',
            'address' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'string',
                'max:30',
                Rule::unique('suppliers')->ignore($this->id)
            ],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'fax' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15'
        ];
    }
}
