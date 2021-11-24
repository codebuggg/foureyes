<?php

namespace App\Http\Requests;

class RegisterUserRequest extends JSONRequest
{
     public function rules()
     {
         return [
           'name' => 'required|max:50',
           'email' => 'required|email',
           'password' => 'required|min:6',
           'cpassword' => 'required|same:password',
         ];
     }
}
