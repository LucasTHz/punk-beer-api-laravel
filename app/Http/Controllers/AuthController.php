<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Response;

class AuthController
{
    public function login(AuthLoginRequest $request): Response
    {
        $token = AuthService::attempt($request->safe()->only('email', 'password', 'deviceName'));

        return response([
            'message' => 'Autenticação realizada com sucesso.',
            'token' => $token,
        ], 200);
    }
}
