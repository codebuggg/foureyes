<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
             'name' => 'required',
             'description' => 'required',
             'units' => 'required',
             'price' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg',
         ];
     }
}
