<?php

namespace App\Http\Requests\CategoryRequest;

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
            // 'category_id' => 'required|string|size:2|unique:categories',
            'category_id' => 'required|string|size:2|unique:categories,category_id,NULL,id,deleted_at,NULL',
            'category_name' => 'required|string|max:50'
        ];
    }
}
