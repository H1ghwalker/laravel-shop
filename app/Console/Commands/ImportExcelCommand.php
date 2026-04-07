<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ImportJsonPlaceholderCommand extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Get data from excel';

    public function handle() {

        Excel::import(new ProductsImport(), public_path('excel/products.xlsx'));

        dd('finish excel');

    }
}
