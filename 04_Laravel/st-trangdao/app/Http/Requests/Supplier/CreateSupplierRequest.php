<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
            'company_id' => 'required|unique:suppliers|string|size:3',
            'transaction_name' => 'required|string|unique:suppliers|max:50',
            'address' => 'required|string|max:50',
            'email' => 'required|unique:suppliers|email',
            'phone' => 'required|unique:suppliers|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15',
            'fax' => 'required|unique:suppliers|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15',
        ];
    }
}
