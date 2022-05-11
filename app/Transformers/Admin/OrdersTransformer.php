<?php

namespace App\Transformers\Admin;

use League\Fractal;

use App\Models\Order;

class OrdersTransformer extends Fractal\TransformerAbstract
{
  public function transform(Order $order)
	{
    return [
      'id' => (int) $order->id,
      "user" => $order->user->name,
      "total" => $order->total,
      "state" => $order->state,
    ];
	}
}