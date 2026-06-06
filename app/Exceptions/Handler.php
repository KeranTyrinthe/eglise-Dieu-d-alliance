<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        AuthorizationException::class,
    ];

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Authorization exceptions -> 403
        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.403', ['exception' => $exception], 403);
        }

        // HTTP exceptions (404, 500, etc.)
        if ($exception instanceof HttpExceptionInterface) {
            $status = $exception->getStatusCode();
            if (view()->exists("errors.{$status}")) {
                return response()->view("errors.{$status}", ['exception' => $exception], $status);
            }
        }

        // Log the exception for diagnosis
        Log::error($exception->getMessage(), ['exception' => $exception]);

        // Fallback to parent (this will show debug info if APP_DEBUG=true)
        return parent::render($request, $exception);
    }
}
