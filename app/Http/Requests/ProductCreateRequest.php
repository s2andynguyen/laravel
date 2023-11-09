<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'price'=>'required',
            'price_sale'=>'lt:price',
            'category_id'=>'required',
            'description'=>'required',
            'file'=>'required',
            'content'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá.',
            'price_sale.lt'=>'Giá sale phải nhỏ hơn giá gốc.',
            'category_id.required' => 'Vui chọn danh mục.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'file.required'=>'Vui lòng chọn ảnh sản phẩm.',
            'content.required'=>'Vui nhập thông tin chi tiết cho sản phẩm.'
        ];
    }
}
