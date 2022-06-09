<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên tài khoản không được phép trống.',

            'email.required' => 'Email không được phép để trống.',
            'email.email' => 'Email sai định dạng.',
            'email.unique' => 'Email đã tồn tại.',

            'password.required' => 'Mật khẩu không được phép để trống.',
            'password.min' => 'Mật khẩu cần tối thiểu 6 kí tự.',

            'password_confirmation.required' => 'Mật khẩu xác nhận không được phép để trống.',
            'password_confirmation.same' => 'Mật khẩu xác nhận không đúng',

        ];
    }
}
