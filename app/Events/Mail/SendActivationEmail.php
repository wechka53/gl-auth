<?php

namespace App\Events\Mail;

use App\Models\User;

/**
 * Class SuccessfulRegistrationEvent
 * @package App\Events\Mail
 */
class SendActivationEmail
{
    const EVENT_TYPE = 'user_activation';

    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $token;

    /**
     * SendActivationEmail constructor.
     * @param User $user
     * @param string $token
     */
    public function __construct(User $user, string  $token)
    {
        $this->user = $user;
        $this->token = $token;
    }
}