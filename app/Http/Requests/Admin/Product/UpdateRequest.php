<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->all());
        return [
            'name' => 'required|min:0',
            'price' => 'required|min:0',
            'quantity' => 'required|min:0',
            'category_id' => 'required',
            'image' => '',
        ];
    }
    public function messages()
    {
        return [
            'required' => ' :attribute không được để trống',
            'name.min' => 'Nhập tên trên 0 ký tự',
            'price.min' => 'Nhập giá',
            'quantity.min' => 'Nhập số lượng',
            'image' => '',

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'price' => 'Gía',
            'quantity' => 'Số lượng',
            'category_id' => '',
            'image' => 'Ảnh',
        ];
    }
}
