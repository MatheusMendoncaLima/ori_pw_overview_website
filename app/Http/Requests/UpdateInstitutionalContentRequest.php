<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInstitutionalContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'section' => ['required', 'string', Rule::in(array_keys(config('ori.sections')))],
            'badge' => ['nullable', 'string', 'max:80'],
            'title' => ['required', 'string', 'max:180'],
            'summary' => ['required', 'string', 'max:6000'],
            'details' => ['nullable', 'string', 'max:30000'],
            'display_order' => ['required', 'integer', 'min:0', 'max:2147483647'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
