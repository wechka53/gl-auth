<?php

namespace App\Interfaces\Services\Auth;
use App\Models\User;

/**
 * Interface AuthServiceInterface
 * @package App\Interfaces\Services
 */
interface AuthenticateById
{

    /**
     * @param string $id
     * @return User|null
     */
    public function authenticateById(string $id): ?User;

}