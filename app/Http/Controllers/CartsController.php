<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;

class CartsController extends Controller
{

    public function store()
    {
        $cart = Cart::create();
        if($cart)
        {
          return response()
            ->json($cart, 201);
        }
    }

}
