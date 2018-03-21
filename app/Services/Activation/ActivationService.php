<?php

namespace App\Services\Activation;

use App\Interfaces\Services\Activation\ActivationServiceInterface;
use App\Models\User;
use App\Models\UserActivation;
use Carbon\Carbon;
use DB;
use Exception;

/**
 * Class ActivationService
 * @package App\Services\Activation
 */
class ActivationService implements ActivationServiceInterface
{
    /**
     * @var int
     */
    private $tokenExpiration;

    /**
     * ActivationService constructor.
     */
    public function __construct()
    {
        $this->tokenExpiration = config('auth.activation.token.expiration');
    }

    /**
     * @param User $user
     * @return string
     * @throws \Exception
     */
    public function generateActivationToken(User $user): string
    {
        $token = $this->generateToken();

        $params = [
            'token' => $token,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addDays($this->tokenExpiration)
        ];

        try {
            DB::beginTransaction();
            UserActivation::create($params);
            DB::commit();
            return $token;

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }


    /**
     * @param UserActivation $tokenRecord
     * @return bool
     */
    public function validateTokenRecord(UserActivation $tokenRecord): bool
    {
        return $tokenRecord->expired_at > Carbon::now();
    }

    /**
     * @param string $token
     * @return User|null
     * @throws Exception
     */
    public function activate(string $token): ?User
    {
        $record = UserActivation::whereToken($token)->first();

        if (!$record) {
            return null;
        }

        if ($this->validateTokenRecord($record)) {
            try {
                DB::beginTransaction();
                $user = User::findOrFail($record->user_id);
                $user->activated = true;
                $user->save();

                DB::commit();
                return $user;

            } catch (Exception $exception) {
                DB::rollBack();
                throw $exception;
            }
        }

        return null;
    }

    /**
     * @return string
     */
    private function generateToken(): string
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
}