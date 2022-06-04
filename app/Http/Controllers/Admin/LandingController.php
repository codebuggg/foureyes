<?php

namespace App\Http\Controllers\Admin;

use App\Models\Landing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


class LandingController extends Controller
{

    public function update(Request $request)
    {
        try {
            $landing = Landing::first();
            $landing->update(["body" => json_encode($request->all())]);
        } catch (Exception $th) {
            Log::debug($e);
        }
    }


}
