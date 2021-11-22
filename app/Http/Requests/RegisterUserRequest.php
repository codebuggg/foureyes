<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{

     public function rules()
     {
         return [
           'name' => 'required|max:50',
           'email' => 'required|email',
           'password' => 'required|min:6',
           'c_password' => 'required|same:password',
         ];
     }
}
