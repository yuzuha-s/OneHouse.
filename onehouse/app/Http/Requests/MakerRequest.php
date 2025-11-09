<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'name' => ['required', 'string', 'max:255'],
        'sales' => ['nullable', 'string', 'max:255'],
        'option' => ['nullable', 'string', 'max:255'],
        'star' => ['required', 'array'],
        'star.*' => ['integer', 'min:1', 'max:5'],
        'features' => ['nullable', 'array'],
        'features.*' => ['integer','exists:features,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'star.required' => '星評価は1以上を選択してください。',
            'star.*.integer' => '星の値が不正です。',
            'features.*.exists' => '選択された特徴が存在しません。',
        ];
    }
}
