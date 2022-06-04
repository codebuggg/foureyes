<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Landing;

use App\Transformers\ProductsTransformer;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function recent()
    {
        $products = Product::take(3)->get();
        $products = fractal($products, new ProductsTransformer())->toArray();
        return response()->json($products);
    }

    public function landing()
    {
        $landing = Landing::first();
        return response()->json($landing->body);
    }
}
