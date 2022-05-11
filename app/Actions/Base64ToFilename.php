<?php

namespace App\Actions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Base64ToFilename
{

  public function execute($request, $type = "image/")
  {
    try
    {
      $image_parts = explode(";base64,", $request->file);
      $image_type_aux = explode($type, $image_parts[0]);
      $image_type = $image_type_aux[1];
      $image_base64 = base64_decode($image_parts[1]);
      $imageName = uniqid().".".$image_type;
      Storage::put($imageName, $image_base64); //app/public
      return $imageName;
    }catch(\Exception $e)
    {
      Log::debug($e);
    }
  }
}
