<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'name'=>'required',
                'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên Danh mục.',
            'description.required' => 'Vui lòng nhập mô tả.',
        ];
    }
}
