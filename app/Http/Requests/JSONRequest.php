<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class JSONRequest extends FormRequest
{
  protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
  {
      $response = new Response($validator->errors(), 422);
      throw new ValidationException($validator, $response);
  }
}
