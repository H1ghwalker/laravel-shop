<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void {

        $categories = Category::factory(5)->create();
        $tags = Tag::factory(10)->create();
        $products = Product::factory(200)->create();

        foreach($products as $product) {
            $tagsIds = $tags->random(5)->pluck('id');
            $product->tags()->attach($tagsIds);
        }
        
    }
}
