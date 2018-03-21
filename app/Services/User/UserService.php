<?php

namespace App\Services\User;

use App\Interfaces\Services\Activation\ActivationServiceInterface;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Models\Role;
use App\Models\User;
use DB;
use Exception;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

    /**
     * @var AuthServiceInterface
     */
    protected $authService;

    /**
     * @var ActivationServiceInterface
     */
    protected $activationService;

    /**
     * UserService constructor.
     * @param AuthServiceInterface $authService
     * @param ActivationServiceInterface $activationService
     */
    public function __construct(AuthServiceInterface $authService, ActivationServiceInterface $activationService)
    {
        $this->authService = $authService;
        $this->activationService = $activationService;
    }

    /**
     * @param array $parameters
     *
     * @return \App\Models\User
     * @throws \Exception
     */
    public function create(array $parameters): User
    {
        try {
            DB::beginTransaction();
            $user = User::create($parameters);
            $user->password = bcrypt($user->password);
            $user->save();

            $role = Role::where('type', $parameters['role'])->first();

            $user->roles()->attach($role);

            DB::commit();
            return $user;

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param \App\Models\User $user
     * @param array $parameters
     *
     * @return \App\Models\User
     */
    public function update(User $user, array $parameters): User
    {
        // TODO: Implement update() method.
    }

    /**
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function delete(User $user): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param string $token
     * @return User|null
     */
    public function activate(string $token): ?User
    {
        return $this->activationService->activate($token);
    }
}