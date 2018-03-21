<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ActivationUserRequest;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param ActivationUserRequest $request
     * @param UserServiceInterface $userService
     * @return JsonResponse
     */
    public function activate(
        ActivationUserRequest $request,
        UserServiceInterface $userService
    ): JsonResponse
    {
        $userData = $request->validated();
        $token = $userData['token'];

        $user = $userService->activate($token);

        if ($user) {
            return response()->success($user);
        }

        return response()->error(
            [trans('validation.custom.token.default')],
            ['type' => 'ValidationError'],
            JsonResponse::HTTP_BAD_REQUEST
        );
    }

    /**
     * @param AuthServiceInterface $authService
     * @return mixed
     */
    public function get(AuthServiceInterface $authService) {
        $currUser = $authService->getCurrentUser();

        if($currUser->can('viewAll', User::class)) {
            $users = User::with('roles')->get();
        } else {
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->where('type', '=', 'admin');
            })->with('roles')->where('activated', '!=', 0)->get();
        }

        return response()->success($users, ['total' => $users->count()]);

    }

}
