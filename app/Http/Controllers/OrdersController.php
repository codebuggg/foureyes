<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use \App\Models\CartProduct;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use Auth;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{

    public function __construct()
    {
        #$this->middleware("auth");
    }

    public function index()
    {
        $orders = Auth::user()->orders()->with('products')->get();
        return response()->json($orders, 200);
    }

    public function store(StoreOrderRequest $request)
    {
      try {
        $params = $request->all();

        $cart_products = CartProduct::where([
          "cart_id" => $request->cart_id,
        ])->get(); // fetch user cart for creating order products

        if(!$cart_products->first()) return response("", 422);

        $order = Order::create([
          "user_id" => 1,
        ]);

        $subtotal = 0;
        foreach ($cart_products as $key => $item) {
          $quantity = $item->quantity;
          $product = $item->product;
          $price = $product->price;
          $total_price = $price * $quantity;
          OrderProduct::create([
            "product_id" => $product->id,
            "quantity" => $quantity,
            "price" => $price,
            "total" => $total_price,
            "order_id" => $order->id,
          ]);
          $subtotal += $total_price;
          #CartProduct::destroy($item->id);
        }

        $order->update([
          'total' => $subtotal,
          'subtotal' => $subtotal,
        ]);

        return response()->json([
            'status' => (bool) $order,
            'data'   => $order,
            'message' => $order ? 'Order Created!' : 'Error Creating Order'
        ], 201);
      } catch (Exception $e) {
        Log::info($e);
      }
    }

    public function show(Order $order)
    {
        return response()->json(new OrderResource($order), 200);
    }

    public function destroy(Order $order)
    {
        $order->update(["state" => "Cancelled"]);
    }


}
