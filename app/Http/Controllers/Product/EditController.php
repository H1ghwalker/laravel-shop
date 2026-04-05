<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product) {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('product.edit', compact('product', 'categories', 'tags'));
    }
}
