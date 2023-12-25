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
            'ho_ten' => ['string', 'required'],
            'email' => ['email', 'required'],
            'dien_thoai' => ['required','numeric', 'min:10'],
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.string' => 'Mã chi nhánh sai định dạng!',
            'ho_ten.required' => 'Họ Tên không được bỏ trống!',
            'email.email' => 'Email sai định dạng!',
            'dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'dien_thoai.numeric' => 'Số điện thoại sai định dạng!',
            'dien_thoai.min' => 'Số điện thoại sai định dạng!',
        ];
    }
}
