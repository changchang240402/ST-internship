<?php

namespace App\Http\Requests\Employees;

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
            'employee_id' => 'required|string|unique:employees,employee_id|size:4',
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date|before:today',
            'start_date' => 'required|date|before_or_equal:today',
            'address' => 'required|string|max:60',
            'phone' => 'required|string|regex:/^([0-9\-\+\(\)]*)$/|max:15',
            'base_salary' => 'required|numeric|decimal:1,10',
            'allowance' => 'required|numeric|decimal:1,10',
        ];
    }
}
