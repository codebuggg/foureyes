<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Transformers\Admin\FeaturesTransformer;


class FeaturesController extends Controller
{

    public function store(Request $request)
    {
        $feature = Feature::create($request->all());
        return response()->json($feature, 201);
    }

    public function destroy($feature)
    {
        Feature::destroy($feature);
    }


}