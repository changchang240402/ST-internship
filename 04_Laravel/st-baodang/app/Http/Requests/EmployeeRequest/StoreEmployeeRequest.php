<?php

namespace App\Http\Requests\EmployeeRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
                'unique:employees,employee_id,NULL,id,deleted_at,NULL'
            ],
            'last_name' => 'required|string|max:40',
            'first_name' => 'required|string|max:40',
            'birthday' => 'required|date',
            'start_date' => 'required|date',
            'address' => 'required|string|max:60',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'base_salary' => 'required|numeric',
            'allowance' => 'numeric'
        ];
    }
}
