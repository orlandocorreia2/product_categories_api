<?php

namespace App\Modules\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "description" => ['required', 'string', 'min:3', 'max:255', Rule::unique('categories')]
        ];
    }
}
