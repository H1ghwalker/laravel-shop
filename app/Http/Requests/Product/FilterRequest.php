<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric|min:0',
            'image' => 'string',
            'stock' => 'integer|min:0',
            'category_id' => 'integer|exists:categories,id',
            'page' => '',
            'per_page' => '',
            'tags' => ''
        ];
    }
}
