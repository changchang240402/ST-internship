<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'category_id' => 'required|unique:categories|max:2',
            'category_name' => 'required|string|unique:categories|max:255',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng nhập ID danh mục.',
            'category_id.unique' => 'ID danh mục đã tồn tại.',    
            'category_id.max' => 'Tên danh mục không được vượt quá 2 ký tự.',         
            'category_name.required' => 'Vui lòng nhập Tên danh mục.',
            'category_name.string' => 'Tên danh mục phải là chuỗi.',
            'category_name.unique' => 'Tên danh mục đã tồn tại.',
            'category_name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ];
    }

}
