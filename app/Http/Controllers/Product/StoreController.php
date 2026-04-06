<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;


use App\Http\Resources\Product\ProductResource;
use App\Http\Controllers\Product\BaseController;
use App\Http\Requests\Product\StoreRequest;
use App\Services\Product\ProductService;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) {

        $data = $request->validated();

        $product = $this->service->store($data);

        return $product instanceof Product ? new ProductResource($product) : $product;

        //return redirect()->route('product.index');
    }
}
