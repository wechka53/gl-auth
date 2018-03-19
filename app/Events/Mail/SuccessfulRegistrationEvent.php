<?php

namespace App\Events\Mail;

use App\Models\User;

/**
 * Class SuccessfulRegistrationEvent
 * @package App\Events\Mail
 */
class SuccessfulRegistrationEvent
{
    const EVENT_TYPE = 'successful_registration';

    /**
     * @var User
     */
    public $user;

    /**
     * SuccessfulRegistrationEvent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}