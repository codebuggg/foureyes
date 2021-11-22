<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{

    public function rules()
    {
        return [
            "product_id" => "required",
            "quantity" => "required"
        ];
    }
}
