<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tags' => '',
            'tags.*.name' => '',
        ];
    }
}
