<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'birthDt' => 'required|date',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'status' => 'required',
            'class_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'fullName.required' => 'Họ tên không được phép để trống.',

            'birthDt.required' => 'Ngày sinh không được phép để trống.',
            'birthDt.date' => 'Ngày sinh sai định dạng.',

            'email.required' => 'Email không được phép để trống.',
            'email.email' => 'Email sai định dạng.',

            'phoneNumber.required' => 'SĐT không được phép để trống.',
            'phoneNumber.numeric' => 'SĐT sai định dạng.',

            'status' => 'Vui lòng chọn tình trạng.',

            'class_id.required' => 'Vui lòng chọn lớp.',

        ];
    }
}
