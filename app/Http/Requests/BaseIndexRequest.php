<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseIndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function baseRules(): array
    {
        return [
            'filter' => ['nullable', 'string'],
            'page' => ['nullable', 'int'],
            'per_page' => ['nullable', 'int'],
        ];
    }
}
