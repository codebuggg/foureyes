<?php

namespace App\Http\Requests;

class StoreOrderRequest extends JSONRequest
{

    public function rules()
    {
        return [
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "landmark" => "required",
        ];
    }
}
