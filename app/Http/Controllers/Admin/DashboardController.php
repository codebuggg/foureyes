<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Transformers\Admin\OrdersTransformer;

class DashboardController extends Controller
{

    public function index()
    {
      $ordersQuery = Order::all();
      $income = $ordersQuery->sum("total");
      $userCount = Order::distinct("user_id")->count("user_id");
      $ordersSum = $ordersQuery->count();
      return response()->json([
        "ordersSum" => $ordersSum,
        "income" => $income,
        "userCount" => $userCount,
        "orders" => fractal($ordersQuery, new OrdersTransformer())->toArray(),
      ]);
    }

}
