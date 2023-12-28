<?php

namespace App\Modules\Nhansu\src\Http\Requests\NhanVien;

use Illuminate\Foundation\Http\FormRequest;

class UngVienRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'ho_ten' => ['required', 'string'],
            'email' => ['required', 'email',],
            'dien_thoai' => ['required','numeric', 'min:10'],
            'ngay_sinh' => ['required','numeric', 'max:2'],
            'thang_sinh' => ['required','numeric', 'max:2'],
            'nam_sinh' => ['required','numeric'],
            'image' => ['extensions:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ Tên không được bỏ trống!',
            'ho_ten.string' => 'Họ Tên sai định dạng!',
            'email.required' => 'Email không được bỏ trống!',
            'email.email' => 'Email sai định dạng!',
            'dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'dien_thoai.numeric' => 'Số điện thoại sai định dạng!',
            'dien_thoai.min' => 'Số điện thoại sai định dạng!',
            'ngay_sinh.required' => 'Ngày sinh không được để trống!',
            'ngay_sinh.numeric' => 'Ngày sinh sai định dạng!',
            'ngay_sinh.max' => 'Ngày sinh sai định dạng!',
            'thang_sinh.required' => 'Tháng sinh không được để trống!',
            'thang_sinh.numeric' => 'Tháng sinh sai định dạng!',
            'thang_sinh.max' => 'Tháng sinh sai định dạng!',
            'nam_sinh.required' => 'Năm sinh không được để trống!',
            'nam_sinh.numeric' => 'Năm sinh sai định dạng!',
            'image.extensions' => 'Ảnh sai định dạng!',
            'image.max' => 'Ảnh có kích thước quá lớn!',
        ];
    }
}
