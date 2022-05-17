<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\Admin\CustomersTransformer;


class CustomersController extends Controller
{

    public function index()
    {
        $customers = User::all();
        $customers = fractal($customers, new CustomersTransformer())->toArray();
        return response()->json($customers, 200);
    }


}
