<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('product.create', compact('categories', 'tags'));
    }
}
