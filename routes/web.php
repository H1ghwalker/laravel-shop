<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});

Route:: get('/products', function () {
    return 'The catalog of items...';
});

Route::get('/my_page', [MyController::class, 'index']);
