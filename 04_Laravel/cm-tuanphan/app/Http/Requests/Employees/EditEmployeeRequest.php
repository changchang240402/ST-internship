<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;

class EditEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'start_date' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => ['required', new PhoneNumber],
            'base_salary' => 'required|numeric',
            'allowance' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập Họ.',
            'last_name.required' => 'Vui lòng nhập Tên.',
            'birthday.required' => 'Vui lòng nhập Sinh nhật.',
            'birthday.date' => 'Sinh nhật phải là một ngày hợp lệ.',
            'start_date.required' => 'Vui lòng nhập Ngày bắt đầu làm việc.',
            'start_date.date' => 'Ngày bắt đầu làm việc phải là một ngày hợp lệ.',
            'address.required' => 'Vui lòng nhập Địa chỉ.',
            'phone.required' => 'Vui lòng nhập Số điện thoại.',
            'base_salary.required' => 'Vui lòng nhập Lương cứng.',
            'base_salary.numeric' => 'Lương cứng phải là một số.',
            'allowance.required' => 'Vui lòng nhập Trợ cấp.',
            'allowance.numeric' => 'Trợ cấp phải là một số.',
        ];
    }
}
