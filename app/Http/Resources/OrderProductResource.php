<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          "product" => new ProductResource($this->product),
          "total" => $this->total,
        ];
    }
}
