<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::with('images', 'colors')->get();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = Product::with('images', 'colors', 'features')->find($id);
        #if($product->units == 0) return response("Out of stock", 404);
        return response()->json($product, 200);
    }

}
