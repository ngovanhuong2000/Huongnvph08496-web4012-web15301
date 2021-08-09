<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

    public function rules()
    {
        // dd($this->all());
        return [
            'name' => 'required|min:0',
        ];
    }
    public function messages()
    {
        return [
            'required' => ' :attribute không được để trống',
            'name.min' => 'Họ tên trên 0 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
        ];
    }
}
