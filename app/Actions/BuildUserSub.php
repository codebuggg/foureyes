<?php

namespace App\Actions;

use App\Models\UserSub;
use Illuminate\Support\Facades\Log;

use Mail;

use App\Mail\SendCert;

class BuildUserSub
{
  public function execute($sub)
  {
    $id = $sub->id;
    $user = auth()->user();
    $user_id = $user->id;
    UserSub::where([
      "sub_id" => $id,
      "user_id" => $user_id,
    ])->delete();
    $user_sub = UserSub::create([
      "sub_id" => $id,
      "user_id" => $user_id,
    ]);
    $course = $user_sub->sub->section->course;
    if($course->completed())
    {
      Mail::to($user)
          ->send(new SendCert($course, $user));
      if (Mail::failures()) {
        Log::debug("Email failed");
      }
    }
    return $course;
  }
}
