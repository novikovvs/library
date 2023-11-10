<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): JsonResponse|Response
    {
        if ($e instanceof ValidationException) {
            return new JsonResponse([
                'message' => $e->getMessage(),
                'data'    => $e->errors(),
            ], $e->getCode() ?: 422);
        }

        return parent::render($request, $e);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  Request  $request
     */
    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse
    {
        return new JsonResponse(['message' => $exception->getMessage()], 401);
    }

    /**
     * Determine if the exception handler response should be JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function shouldReturnJson($request, Throwable $e): bool
    {
        return true;
    }
}
