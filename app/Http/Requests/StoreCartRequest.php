<?php

namespace App\Http\Requests;

class StoreCartRequest extends JSONRequest
{

    public function rules()
    {
        return [
            "product_id" => "required",
            #"quantity" => "required"
        ];
    }
}
