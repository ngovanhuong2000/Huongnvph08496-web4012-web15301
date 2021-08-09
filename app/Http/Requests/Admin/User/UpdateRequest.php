<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RuleEmailUniqueOnUpdateUser;

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
        return [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                new RuleEmailUniqueOnUpdateUser(),
            ],
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
