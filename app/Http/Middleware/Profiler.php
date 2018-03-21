<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

/**
 * Class Profiler
 * @package App\Http\Middleware
 */
class Profiler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (
            $response instanceof JsonResponse &&
            app()->bound('debugbar') &&
            app('debugbar')->isEnabled() &&
            is_object($response->getData()) &&
            config('app.debug') === true &&
            filter_var($request->get('debug'), FILTER_VALIDATE_BOOLEAN) === true
        ) {

            $response->setData($response->getData(true) + [
                    '_debugbar' => app('debugbar')->getData()['queries'],
                ]);
        }

        return $response;
    }

}
