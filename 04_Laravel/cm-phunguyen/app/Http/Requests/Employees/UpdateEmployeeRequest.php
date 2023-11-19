<?php

namespace App\Http\Requests\Employees;

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
            'employee_id' => ['required', 'unique:employees,employee_id,' . $this->employee . ',id', 'size:4'],
            'last_name' => 'required|max:8',
            'first_name' => 'required|max:8',
            'birthday' => 'required|date_format:Y-m-d H:i:s',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'address' => 'required|string|max:40',
            'phone' => ['required', 'unique:employees,phone,' . $this->employee . ',id', 'regex:/^([0-9\-\+\(\)]*)$/','max:15'],
            'base_salary' => 'required|numeric|min:0',
            'allowance' => 'required|numeric|min:0'
        ];
    }
}
