<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;

class CartsController extends Controller
{

    public function __construct()
    {
        #$this->middleware("auth:api");
    }

    public function index(Request $request)
    {
        $cart_id = $request->cart_id;
        $cart = Cart::with('products')->where(["carts.id" => $cart_id])->first();
        return response()->json($cart, 200);
    }

    public function store(StoreCartRequest $request)
    {
        $cart_id = $request->cart_id;
        $product_id = $request->product_id;
        $cart = Cart::find($cart_id);
        $product = Product::find($product_id);
        $cart_product = CartProduct::create([
          "cart_id" => $cart_id,
          "product_id" => $product_id,
          "quantity" => 1,
        ]);
    }

    public function destroy(Request $request)
    {
        $cart_id = $request->cart_id;
        $product_id = $request->product_id;
        $cart = Cart::find($cart_id);
        $product = Product::find($product_id);
        $cart_product = CartProduct::where([
          "cart_id" => $cart_id,
          "product_id" => $product_id
        ])->first();
        $cart_product->delete();
    }

    public function update(Request $request)
    {
        $cart = $this->set_cart($request);
        $cart->update(["quantity" => $request->quantity]);
    }

    private function set_cart($request)
    {
        return Cart::firstWhere([
          "user_id" => \Auth::id(),
          "product_id" => $request->product_id,
        ]);
    }
}
