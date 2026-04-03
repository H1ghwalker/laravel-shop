<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ProductTag;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('product.create', compact('categories', 'tags'));

    }

    public function store() {
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

        $product = Product::create($data);

        $product->tags()->attach($tags);

        return redirect()->route('product.index');

    }

    public function show(Product $product) {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product) {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('product.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Product $product) {
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

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('product.index');
    }

    //firstOrCreate
    public function firstOrCreate() {
        $anotherProduct = [
            'name' => 'bounty_x2',
            'description' => 'b',
            'price' => 121,
            'image' => 'bounty_image2.jpg',
            'stock' => 122,
        ];

        $product = Product::firstOrCreate
        (
            [
              'name' => 'bounty_x2'  
            ],
             [
                'name' => 'bounty_x2',
                'description' => 'b',
                'price' => 121,
                'image' => 'bounty_image2.jpg',
                'stock' => 122,
             ]
        );
        dump($product->name);
        dd('finished');
    }

    //updateOrCreate
    public function updateOrCreate() {
        $anotherProduct = [
            'name' => 'updated_bounty',
            'description' => 'THE BOUNTY',
            'price' => 20,
            'image' => 'bounty_image2.jpg',
            'stock' => 22,
        ];

        $product = Product::updateOrCreate
        (
            [
                'name' => 'bounty_x2'
            ],
            [
                'name' => 'bounty_x2',
                'description' => 'THE BOUNTY NOT UPDATED',
                'price' => 20,
                'image' => 'bounty_image3.jpg',
                'stock' => 22,
            ]
        );
        dd($product->name);
    }
}
