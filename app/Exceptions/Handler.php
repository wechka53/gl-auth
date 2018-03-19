<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
              return $exception->getResponse();
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->notFound();
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->error([trans('http.401')], JsonResponse::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof Exception) {
              if(config('app.debug')) {
                  return parent::render($request, $exception);
              } else {
                  return response()->error(['exception' => $exception->getMessage()], ['type' => 'serverError'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
              }
        }
    }
}
