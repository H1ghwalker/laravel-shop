<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    public function __invoke(Product $product) {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);
        $product->tags()->sync($tags);

        return redirect()->route('product.show', $product->id);
    }
}
