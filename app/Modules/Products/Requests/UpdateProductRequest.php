<?php

namespace App\Modules\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "category_id" => ['required','uuid'],
            "description" => ['required', 'string', 'min:3', 'max:255', Rule::unique('products')->ignore($this->id)]
        ];
    }
}
