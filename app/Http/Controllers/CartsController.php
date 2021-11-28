<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartsController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:api");
    }

    public function index()
    {
        $cart = Cart::with('product')->where(["user_id" => \Auth::id()])->get();
        return response()->json($cart, 200);
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::make($request->all());
        $cart->user_id = \Auth::id();
        $cart->quantity = 1;
        $cart->save();
    }

    public function destroy(Request $request)
    {
        $cart = $this->set_cart($request);
        $cart->destroy($cart->id);
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
