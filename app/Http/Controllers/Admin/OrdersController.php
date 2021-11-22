<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use \App\Models\Cart;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return response()->json($orders, 200);
    }

    public function show(Order $order)
    {
        return response()->json($order, 200);
    }

    public function destroy($order)
    {
        Order::destroy($order);
    }


}
