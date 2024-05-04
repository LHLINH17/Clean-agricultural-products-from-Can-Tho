<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//để flase la SAI NHA !!! LỖI 403
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
//            'thumb' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'description.required' => 'Vui lòng điền mô tả sản phẩm',
            'price.required' => 'Vui lòng nhập giá của sản phẩm',
//            'thumb.required' => 'Ảnh sản phẩm không được trống'
        ];
    }
}
