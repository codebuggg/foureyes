<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;

use Illuminate\Support\Facades\Log;


use App\Transformers\CartProductsTransformer;

class CartProductsController extends Controller
{

    public function index(Request $request, $cart_id)
    {
        $cart_products = CartProduct::with('product')->where(["cart_id" => $cart_id])->get();
        $cart_products = fractal($cart_products, new CartProductsTransformer())->toArray();
        return response()->json($cart_products);
    }

    public function store(StoreCartRequest $request, $cart_id)
    {
        $product_id = $request->product_id;
        $color_id = $request->color_id;
        $params = [
          "cart_id" => $cart_id,
          "product_id" => $product_id,
          "color_id" => $color_id,
        ];
        $cart_product = CartProduct::firstWhere($params);
        if($cart_product) $cart_product->update(["quantity" => $cart_product->quantity += 1]);
        else $cart_product = CartProduct::create($params);
    }

    public function destroy(Request $request, $cart_id, $product_id)
    {
        $cart_product = CartProduct::firstWhere([
          "cart_id" => $cart_id,
          "product_id" => $product_id
        ]);
        if($cart_product->quantity > 1) $cart_product->update(["quantity" => $cart_product->quantity -= 1]);
        else $cart_product->delete();
    }

    public function update(Request $request)
    {
        $cart = $this->set_cart($request);
        $cart->update(["quantity" => $request->quantity]);
    }
}
