<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Product\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Services\Product\ProductService;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('product.index');
    }
}
