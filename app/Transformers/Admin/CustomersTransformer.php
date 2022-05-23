<?php

namespace App\Transformers\Admin;

use League\Fractal;

use App\Models\User;

class CustomersTransformer extends Fractal\TransformerAbstract
{
  public function transform(User $customer)
	{
    return [
      'id' => (int) $customer->id,
      "user" => $customer->name,
      "phone" => $customer->phone,
      "date" => $customer->created_at,
    ];
	}
}
