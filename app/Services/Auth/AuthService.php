<?php


namespace App\Services\Auth;


use App\Interfaces\Services\Auth\AuthenticateByCredentials;
use App\Interfaces\Services\Auth\AuthenticateById;
use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Models\User;

/**
 * Class AuthService
 * @package App\Services\Auth
 */
class AuthService implements AuthServiceInterface
{

    /**
     * @var \App\Models\User;
     */
    private $currentUser;

    /**
     * @var string|bool
     */
    private $token;

    /**
     * @param array $credentials
     * @return User|null
     */
    public function authenticateByCredentials(array $credentials): ?User
    {
        $credentials['activated'] = User::STATUS_ACTIVATED;

        $this->token = auth()->attempt($credentials);

        if ($this->token) {
            $this->currentUser = auth()->user()->fresh('roles');
            return $this->currentUser;
        }

        return null;
    }

    /**
     * @param string $id
     * @return User|null
     */
    public function authenticateById(string $id): ?User
    {
        // TODO: Implement authenticateById() method.
    }

    /**
     * @return User|null
     */
    public function getCurrentUser(): ?User
    {
        return $this->currentUser;
    }

    /**
     * @return null|string
     */
    public function getAuthToken(): ?string {
        return $this->token;
    }
}