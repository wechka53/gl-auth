<?php

namespace App\Interfaces\Services\Activation;


use App\Models\User;
use App\Models\UserActivation;

/**
 * Interface ActivationServiceInterface
 * @package App\Interfaces\Services\Activation
 */
interface ActivationServiceInterface
{
    /**
     * @param User $user
     * @return string
     */
    public function generateActivationToken(User $user): string;

    /**
     * @param UserActivation $tokenRecord
     * @return bool
     */
    public function validateTokenRecord(UserActivation $tokenRecord): bool;

    /**
     * @param string $token
     * @return User|null
     */
    public function activate(string $token): ?User;
}