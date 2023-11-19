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
            'employee_id' => [
                'required',
                'string',
                'size:4',
                'unique:employees,employee_id,' . $this->employee . ',id'
            ],
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date|before:today',
            'start_date' => 'required|date|before_or_equal:today',
            'address' => 'required|string|max:60',
            'phone' => 'required|string|regex:/^([0-9\-\+\(\)]*)$/|max:15',
            'base_salary' => 'required|numeric',
            'allowance' => 'required|numeric',
        ];
    }
}
