<?php

use App\Actions\Product;
use App\Actions\ProductDetail;
use App\Actions\TestProject;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Product::class)->name('product.index');
Route::get('product/details/{slug}', ProductDetail::class)->name('product.show');
Route::get('products', TestProject::class);


