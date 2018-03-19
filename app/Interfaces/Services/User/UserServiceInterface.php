<?php

namespace App\Interfaces\Services\User;

use App\Models\User;

/**
 * Interface UserServiceInterface
 *
 * @package App\Interfaces\Services
 */
interface UserServiceInterface
{

    /**
     * @param array $parameters
     *
     * @return \App\Models\User
     */
    public function create(array $parameters): User;

    /**
     * @param \App\Models\User $user
     * @param array $parameters
     *
     * @return \App\Models\User
     */
    public function update(User $user, array $parameters): User;

    /**
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function delete(User $user): bool;

    /**
     * @param string $token
     * @return User|null
     */
    public function activate(string  $token): ?User;
}