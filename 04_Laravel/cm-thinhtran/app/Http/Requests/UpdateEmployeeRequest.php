<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'employee_id' => [
                'required',
                'string',
                'max:4',
                Rule::unique('employees')->ignore($this->id),
            ],
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date',
            'start_date' => 'nullable|date',
            'address' => 'required|string|max:60',
            'phone' => 'required|string|max:15',
            'base_salary' => 'required|numeric',
            'allowance' => 'required|numeric',
        ];
    }
}
