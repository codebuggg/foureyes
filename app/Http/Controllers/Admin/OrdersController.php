<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use \App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $orders = Order::where(["user_id" => Auth::id()])->get();
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
