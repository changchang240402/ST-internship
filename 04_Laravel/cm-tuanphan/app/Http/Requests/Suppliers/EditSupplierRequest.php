<?php

namespace App\Http\Requests\Suppliers;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;
use App\Rules\FaxNumber;

class EditSupplierRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'transaction_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => ['required', new PhoneNumber],
            'fax' => ['nullable','string','max:15' , new FaxNumber],
            'email' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Vui lòng nhập Tên công ty.',
            'company_name.max' => 'Tên công ty không được vượt quá 255 ký tự.',
            'transaction_name.required' => 'Vui lòng nhập Tên giao dịch.',
            'transaction_name.max' => 'Tên giao dịch không được vượt quá 255 ký tự.',
            'address.required' => 'Vui lòng nhập Địa chỉ.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone.required' => 'Vui lòng nhập Số điện thoại.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'fax.max' => 'Số fax không được vượt quá 15 ký tự.',
            'email.required' => 'Vui lòng nhập Địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.max' => 'Địa chỉ email không được vượt quá 255 ký tự.',
        ];
    }
}
