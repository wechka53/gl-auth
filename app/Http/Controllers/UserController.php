<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ActivationUserRequest;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return JsonResponse
     */
    public function get(AuthServiceInterface $authService, Request $request) {
        $currUser = $authService->getCurrentUser();

        $limit = $request->query('limit', 10);
        $offset = $request->query('offset', 0);


        if($currUser->can('viewAll', User::class)) {
            $builder = User::with('roles');
        } else {
            $builder = User::whereDoesntHave('roles', function ($query) {
                $query->where('type', '=', Role::ADMIN);
            })->with('roles')->where('activated', '!=', 0);
        }

        $total = $builder->count();
        $users = $builder->take($limit)->skip($offset)->get();

        $meta['results'] = $users->count();
        $meta['total'] = $total;
        $meta['limit'] = $limit;
        $meta['offset'] = $offset;

        return response()->success($users, $meta);

    }

}
