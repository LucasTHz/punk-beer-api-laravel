<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response, $exceptions) {
            if ($response->getStatusCode() === 401) {
                return response([
                    'message' => 'Não autorizado.',
                ], 401);
            }

            if ($exceptions instanceof ValidationException) {
                return response([
                    'message' => 'Erro de validação.',
                    'errors' => $exceptions->errors(),
                ], 422);
            }

            return $response;
        });
    })->create();
