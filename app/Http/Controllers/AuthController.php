<?php

namespace App\Http\Controllers;


use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController
{
    public function login(Request $request): string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $token = AuthService::attempt($request->only('email', 'password', 'device_name'));

        return $token;
    }
}
?>
