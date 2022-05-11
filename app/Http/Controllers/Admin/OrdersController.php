<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use \App\Models\Cart;
use Illuminate\Http\Request;
use App\Transformers\Admin\OrdersTransformer;


class OrdersController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        $orders = fractal($orders, new OrdersTransformer())->toArray();
        return response()->json($orders, 200);
    }

    public function show($id)
    {
        $order = Order::with('products')->find($id);
        return response()->json($order, 200);
    }

    public function state(Request $request, Order $order)
    {
        $status = $order->update([
          "state" => $request->state,
        ]);
        return response()->json([
          "status" => $status,
          "data" => $order,
        ]);
    }

    public function destroy($order)
    {
        Order::destroy($order);
    }


}
