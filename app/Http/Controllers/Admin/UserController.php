<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

}
