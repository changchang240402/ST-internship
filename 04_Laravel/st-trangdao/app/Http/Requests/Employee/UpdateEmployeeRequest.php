<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

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
            'id' => 'required|exists:employees,id|integer',
            'employee_id' => 'required|string|size:4',
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date|before:-18 years',
            'start_date' => 'required|date|before:now',
            'address' => 'required|string|max:50',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15|unique:employees,phone,' . $this->id,
            'base_salary' => 'required|numeric|digits_between:8,10',
            'allowance' => 'numeric|digits_between:6,8',
        ];
    }
}
