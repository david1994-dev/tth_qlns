<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginationRequest extends FormRequest
{
    public int $offset = 0;

    public int $limit = 20;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    /**
     * @return int
     */
    public function offset(): int
    {
        $page = $this->get('page', 1);
        $this->offset = ( $page - 1 ) * $this->limit;

        return $this->offset;
    }

    /**
     * @param int $default
     *
     * @return int
     */
    public function limit(int $default = 20): int
    {
        $this->limit = $default;

        return $this->limit;
    }

    public function order($default = 'id')
    {
        return $this->get('order', $default);
    }

    public function direction($default = 'desc'): string
    {
        $direction = strtolower($this->get('direction', $default));
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        return $direction;
    }
}
