<?php

namespace App\Modules\Nhansu\src\Http\Requests\ChiNhanh;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ChiNhanhRequest extends FormRequest
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
            'ma' => ['string'],
            'ten' => ['required', 'string'],
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
