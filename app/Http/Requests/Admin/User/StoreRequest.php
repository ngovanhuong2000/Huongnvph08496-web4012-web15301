<?php

namespace App\Http\Requests\Admin\User;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /*
     * old($inputName, $defaultValue)
     * $inputName: tên input mà ta muốn lấy giá trị vừa nhập
     * $defaultValue: giá trị mặc định khi không có. Nếu ko truyền vào tham số 2, mặc định $defaultValue là null
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:100',
            'address' => 'required',
            'role' => 'required|in:' . implode(',', config('common.user.role')),
            'gender' => 'required|in:' . implode(',', config('common.user.gender')),
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Họ tên không được vượt quá 100 ký tự',
            'email.email' => 'Sai định dạng email',
            'email.unique' => 'Email đã tồn tại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'role' => 'Tài khoản',
            'gender' => 'Giới tính',
        ];
    }
}
