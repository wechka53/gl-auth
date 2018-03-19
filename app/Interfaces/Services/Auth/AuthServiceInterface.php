<?php

namespace App\Interfaces\Services\Auth;

use App\Models\User;

/**
 * Interface AuthServiceInterface
 * @package App\Interfaces\Services\Auth
 */
interface AuthServiceInterface extends AuthenticateById, AuthenticateByCredentials
{
    /**
     * @return User|null
     */
    public function getCurrentUser(): ?User;

    /**
     * @return null|string
     */
    public function getAuthToken(): ?string;
}