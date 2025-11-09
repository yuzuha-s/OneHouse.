<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'address' => ['required', 'string', 'max:255'],
            'landarea' => ['required', 'decimal:2'],
            'far' => ['required, integer, min:0'],
            'bcr' => ['required, integer, min:0'],
            'floor' => ['required', 'integer', 'min:1', 'max:3'],
            'builable_area'  => ['required, integer, min:0'],
            'pricePerTsubo'  => ['required, integer, min:0'],
        ];
    }
}
