<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use App\Models\Product;

class ImportJsonPlaceholderCommand extends Command
{
    protected $signature = 'app:import-json-placeholder-command';

    protected $description = 'Get data from jsonplaceholder';

    public function handle() {

        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts' );

        $data = json_decode($response->getBody()->getContents());

        foreach($data as $item) {
            Product::firstOrCreate([
                'name' => $item->title
            ], [
                'name' => $item->title,
                'description' => $item->body,
                'price' => 20,
                'stock' => 10,
                'image' => 'default.png',
                'category_id' =>  2
            ]);
        }

    }
}
