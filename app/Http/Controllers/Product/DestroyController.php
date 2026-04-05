<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Product\BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

class DestroyController extends BaseController
{

    public function __invoke(Product $product) {
        $product->delete();
        return redirect()->route('product.index');
    }
}
