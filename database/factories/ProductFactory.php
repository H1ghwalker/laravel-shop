<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' =>$this->faker->text(),
            'price' => random_int(1, 300),
            'image' => $this->faker->imageUrl(),
            'stock' => random_int(1, 20),
            'category_id' => Category::get()->random()->id
        ];
    }
}
