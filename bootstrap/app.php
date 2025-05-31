<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'verifyUserById' => \App\Http\Middleware\VerifyUserById::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->respond(function (Response $response, $exceptions) {
            if (401 === $response->getStatusCode()) {
                return response([
                    'message' => 'Não autorizado.',
                ], 401);
            }

            if ($exceptions instanceof ValidationException) {
                return response([
                    'message' => 'Dados informados são inválidos.',
                    'errors'  => $exceptions->errors(),
                ], 422);
            }

            if ($exceptions instanceof NotFoundHttpException) {
                return response([
                    'message' => 'Recurso não encontrado.',
                ], 404);
            }

            return $response;
        });
    })->create();
