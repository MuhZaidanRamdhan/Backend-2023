<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // menangkap input
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        // menginsert data ke table user
        $user = User::create($input);

        // message
        $data = [
            'message' => 'User created succesfully'
        ];
        // response
        return response()->json($data, 200);

    }
    public function login(Request $request)
    {

        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // mengambil data user 
        $user = User::where('email', $input['email'])->first();

        // membandingkan input user dengan data user 
        $isLoginSuccesfully = (
            $input['email'] == $user->email
            &&
            hash::check($input['password'], $user->password)
        );
        if ($isLoginSuccesfully) {
            // membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Successfully',
                'token' => $token->plainTextToken
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or password is wrong'
            ];

            return response()->json($data, 401);
        }
    }
}