<?php

namespace App\Interfaces\Services\Auth;
use App\Models\User;

/**
 * Interface AuthServiceInterface
 * @package App\Interfaces\Services
 */
interface AuthenticateByCredentials
{
    /**
     * @param array $credentials
     * @return User|null
     */
    public function authenticateByCredentials(array $credentials): ?User;
}