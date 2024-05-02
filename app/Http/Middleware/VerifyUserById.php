<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserById
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->route('user');
        \ds($user);
        $auth = auth()->user();

        if ($auth->id !== $user->id) {
            return response([
                'message' => 'Você não tem permissão para acessar este recurso.',
            ], 403);
        }
        return $next($request);
    }
}
