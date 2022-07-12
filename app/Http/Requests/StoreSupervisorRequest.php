<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupervisorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullName' => 'required',
            'email' => 'required|email|unique:students',
            'phoneNumber' => 'required|numeric',
            'admin_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Họ tên không được phép để trống.',

            'email.required' => 'Email không được phép để trống.',
            'email.email' => 'Email sai định dạng.',
            'email.unique' => 'Email đã tồn tại.',

            'phoneNumber.required' => 'SĐT không được phép để trống.',
            'phoneNumber.numeric' => 'SĐT sai định dạng.',

            'supervisor_id.required' => 'Vui lòng chọn giáo vụ quản lý.',
        ];
    }
}
