<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Transformers\Admin\ColorsTransformer;


class ColorsController extends Controller
{

    public function store(Request $request)
    {
        $color = Color::create($request->all());
        return response()->json($color, 201);
    }

    public function destroy($color)
    {
        Color::destroy($color);
    }


}