<?php

namespace App\Services\Auth;

use App\Models\User;
use ErrorException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthService
{
    static public function attempt($credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw  ValidationException::withMessages([
                'E-mail ou senha incorretos.',
            ]);
        }

        return $user->createToken($credentials['deviceName'])->plainTextToken;
    }
}
