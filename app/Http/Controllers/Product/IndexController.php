<?php

namespace App\Http\Controllers\Product;

//use Illuminate\Support\Facades\Gate;

use App\Http\Resources\Product\ProductResource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Filters\ProductFilter;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {

        //Gate::authorize('view', auth()->user());

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return ProductResource::collection($products);

        //return view('product.index', compact('products'));
    }
}
