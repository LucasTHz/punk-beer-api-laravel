<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function verify(string $id, string $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            return response([
                'message' => 'Hash inválido!',
            ], 400);
        }


        if (!$user) {
            return response([
                'message' => 'Usuário não encontrado!',
            ], 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response([
                'message' => 'Email já verificado!',
            ], 400);
        }

        if (!$user->markEmailAsVerified()) {
            return response([
                'message' => 'Erro ao verificar email!',
            ], 500);
        }

        return response([
            'message' => 'Email verificado com sucesso!',
        ], 200);
    }
}
