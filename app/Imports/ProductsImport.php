<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach($collection as $item) {
            if(isset($item['name']) && $item['name'] != null) {
                Product::firstOrCreate([
                        'name' => $item['name']
                    ],
                    [
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'image' => $item['image'],
                    'category_id' => $item['category_id'],
                ]);
            }
        }
        //dd($collection);
    }
}
