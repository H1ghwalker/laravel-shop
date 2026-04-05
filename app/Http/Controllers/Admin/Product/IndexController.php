<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Filters\ProductFilter;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {
        
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->paginate(10);
        return view('admin.product.index', compact('products'));
    }
}
