<?php

namespace App\Http\Controllers;

use App\Events\Mail\SendActivationEmail;
use App\Events\Mail\SuccessfulRegistrationEvent;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Interfaces\Services\Activation\ActivationServiceInterface;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param AuthServiceInterface $authService
     * @return JsonResponse
     */
    public function login(
        LoginRequest $request,
        AuthServiceInterface $authService): JsonResponse
    {
        $credentials = $request->validated();

        $user = $authService->authenticateByCredentials($credentials);
        $token = $authService->getAuthToken();

        if ($user) {
            return response()->success($user, ['token' => $token]);
        }

        return response()->notFound([trans('auth.failed')]);
    }


    /**
     * @param RegistrationRequest $request
     * @param UserServiceInterface $userService
     * @param ActivationServiceInterface $activationService
     * @return JsonResponse
     */
    public function register(
        RegistrationRequest $request,
        UserServiceInterface $userService,
        ActivationServiceInterface $activationService
    ): JsonResponse
    {
        $userData = $request->validated();
        $user = $userService->create($userData);
        $token = $activationService->generateActivationToken($user);

        event(new SuccessfulRegistrationEvent($user));
        event(new SendActivationEmail($user, $token));

        return response()->success($user, [], JsonResponse::HTTP_CREATED);
    }

    /**
     * This method will return a public key for token validation
     * @return mixed
     */
    public function getPublicKey(): JsonResponse
    {
        $file = config('jwt.keys.public');
        $file = substr($file, 7);

        if (!is_readable($file)) {
            return response()->notFound();
        }

        $key = file_get_contents($file);
        $encodedKey = base64_encode($key);

        return response()->success($encodedKey, ['encoded' => 'base64']);
    }
}
