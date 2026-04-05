<?php

namespace App\Services\Product;
use App\Models\Product;

class ProductService
{
    public function store(array $data): Product {
        $tags = $data['tags'];
        unset($data['tags']);

        $product = Product::create($data);

        $product->tags()->attach($tags);

        return $product;
    }

    public function update(Product $product, array $data): Product {
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);
        $product->tags()->sync($tags);

        return $product;
    }
}