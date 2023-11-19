<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'employee_id' => 'required|unique:employees|string|size:4',
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date|before:-18 years',
            'start_date' => 'required|date|before:now',
            'address' => 'required|string|max:50',
            'phone' => 'required|unique:employees|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15',
            'base_salary' => 'required|numeric|digits_between:8,10',
            'allowance' => 'numeric|digits_between:6,8',
        ];
    }
}
