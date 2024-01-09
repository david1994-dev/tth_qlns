<?php

namespace App\Modules\SuCoYKhoa\src\Http\Request;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BaoCaoSuCoRequest extends FormRequest
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
            'ho_ten_nguoi_benh' => ['required', 'string'],
            'khoa_phong_su_co' => ['required', 'string'],
            'mo_ta' => ['required', 'string'],
            'de_xuat_giai_phap' => ['required', 'string'],
            'giai_phap_da_thuc_hien' => ['required', 'string'],
            'ngay_bao_cao' => ['required', 'string'],
            'ngay_su_co' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'ho_ten_nguoi_benh.required' => 'Họ tên người bệnh không được bỏ trống!',
            'khoa_phong_su_co.required' => 'Khoa phòng sự cố không được bỏ trống!',
            'mo_ta.required' => 'Mô tả không được bỏ trống!',
            'de_xuat_giai_phap.required' => 'Đề xuất giải pháp không được bỏ trống!',
            'giai_phap_da_thuc_hien.required' => 'Giải pháp đã thực hiện không được bỏ trống!',
            'ngay_bao_cao.required' => 'Ngày báo cáo không được bỏ trống!',
            'ngay_su_co.required' => 'Ngày sự cố không được bỏ trống!',
        ];
    }
}
