<?php

namespace App\Http\Requests\Supplier;

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
            'id' => 'required|exists:suppliers,id|integer',
            'company_name' => 'required|string|max:50',
            'company_id' => 'required|string|size:3|unique:suppliers,company_id,' . $this->id,
            'transaction_name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'email' => 'required|email|unique:suppliers,email,' . $this->id,
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15|unique:suppliers,phone,' . $this->id,
            'fax' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15|unique:suppliers,fax,' . $this->id,
        ];
    }
}
