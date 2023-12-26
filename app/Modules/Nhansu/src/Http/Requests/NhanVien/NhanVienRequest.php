<?php

namespace App\Modules\Nhansu\src\Http\Requests\NhanVien;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
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
            'ho_ten' => ['string'],
            'image' => ['required','extensions:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'ma.string' => 'Mã chi nhánh sai định dạng!',
            'ten.required' => 'Tên chi nhánh không được bỏ trống!',
            'ten.string' => 'Tên chi nhánh sai định dạng!',
        ];
    }
}
