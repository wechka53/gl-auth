<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Response::macro('success', function ($data, array $meta = null, int $code = JsonResponse::HTTP_OK) {
            return Response::json([
                'success' => true,
                'data' => $data,
                'meta' => $meta
            ], $code);
        });

        Response::macro('badRequest', function ($errors, $meta = null, int $code = JsonResponse::HTTP_BAD_REQUEST) {
            $errorValues = array_flatten($errors);
            $errorKeys = array_keys($errors);
            $errors = array_combine($errorKeys, $errorValues);

            if(is_null($meta)) {
                $meta = ['type' => 'httpError'];
            }

            return Response::json([
                'success' => false,
                'messages' => $errors,
                'meta' => $meta
            ], $code);
        });

        Response::macro('notFound', function (array $messages = [], $meta = null, int $code = JsonResponse::HTTP_NOT_FOUND) {
            if (empty($messages)) {
                $messages[] = trans('http.404');
            }

            if(is_null($meta)) {
                $meta = ['type' => 'httpError'];
            }

            return Response::json([
                'success' => false,
                'messages' => $messages,
                'meta' => $meta
            ], $code);
        });

        Response::macro('error', function (array $messages = [], $meta = null, int $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR) {
            if (empty($messages)) {
                $messages[] = trans('http.500');
            }

            if(is_null($meta)) {
                $meta = ['type' => 'httpError'];
            }

            return Response::json([
                'success' => false,
                'messages' => $messages,
                'meta' => $meta
            ], $code);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
