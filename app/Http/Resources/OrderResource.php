<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'subtotal' => $this->subtotal,
          'total' => $this->total,
          'order_products' => OrderProductResource::collection($this->order_products),
        ];
    }
}
