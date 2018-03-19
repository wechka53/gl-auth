<?php


namespace App\Listeners;

use App\Events\Mail\SendActivationEmail;
use App\Events\Mail\SuccessfulRegistrationEvent;
use App\Interfaces\Services\Mail\MailServiceInterface;
use Exception;
use Log;

/**
 * Class MailSubscriber
 * @package App\Listeners
 */
class MailSubscriber
{

    /**
     * @var MailServiceInterface
     */
    protected $mailService;

    /**
     * MailSubscriber constructor.
     * @param MailServiceInterface $mailService
     */
    public function __construct(MailServiceInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Handle successful registration event.
     * @param $event
     */
    public function onSuccessfulRegistration(SuccessfulRegistrationEvent $event)
    {
        $user = $event->user;

        try {
            $this->mailService->processMessage(SuccessfulRegistrationEvent::EVENT_TYPE, $user->email, '', $user->name);

        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

    /**
     * Handle send an activation email
     * @param $event
     */
    public function onSendActivationEmail(SendActivationEmail $event)
    {
        $user = $event->user;
        $token = $event->token;

        try {
            $this->mailService->processMessage(SendActivationEmail::EVENT_TYPE, $user->email, '', $token);

        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Mail\SuccessfulRegistrationEvent::class,
            \App\Listeners\MailSubscriber::class . '@onSuccessfulRegistration'
        );

        $events->listen(
            \App\Events\Mail\SendActivationEmail::class,
            \App\Listeners\MailSubscriber::class . '@onSendActivationEmail'
        );
    }
}