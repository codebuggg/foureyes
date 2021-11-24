<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Auth;
use App\Models\User;
use Validator;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $status = 201;
            $response = [
                'data' => Auth::user(),
                'token' => Auth::user()->createToken('bigStore')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }

    public function register(RegisterUserRequest $request)
    {

        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'data' => $user,
            'token' => $user->createToken('bigStore')->accessToken,
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

}
