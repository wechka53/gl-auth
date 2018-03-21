<?php


namespace App\Services\Auth;

use App\Interfaces\Services\Auth\AuthServiceInterface;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Guard;

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
     * @var Guard
     */
    private $guard;


    /**
     * AuthService constructor.
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->guard = $authManager->guard();
        $this->currentUser = $this->guard->user();
    }

    /**
     * @param array $credentials
     * @return User|null
     */
    public function authenticateByCredentials(array $credentials): ?User
    {
        $credentials['activated'] = User::STATUS_ACTIVATED;

        $this->token = $this->guard->attempt($credentials);

        if ($this->token) {
            $this->currentUser = $this->guard->user();
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