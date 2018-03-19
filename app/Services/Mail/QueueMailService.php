<?php

namespace App\Services\Mail;

use App\Events\Mail\SendActivationEmail;
use App\Events\Mail\SuccessfulRegistrationEvent;
use App\Interfaces\Services\Mail\MailServiceInterface;
use App\Interfaces\Services\Queue\QueueServiceInterface;
use Exception;

/**
 * Class QueueMailService
 * @package App\Services\Mail
 */
class QueueMailService implements MailServiceInterface
{

    const QUEUE_NAME = 'mail';

    /**
     * @var \App\Interfaces\Services\Queue\QueueServiceInterface;
     */
    public $queueService;

    /**
     * QueueMailService constructor.
     * @param QueueServiceInterface $queueService
     */
    public function __construct(QueueServiceInterface $queueService)
    {
        $this->queueService = $queueService;
    }

    /**
     * @param string $type
     * @param string $to
     * @param string|null $message
     * @param null $data
     * @throws Exception
     */
    public function processMessage(string $type, string $to, string $message = null, $data = null): void
    {
        switch ($type) {
            case SuccessfulRegistrationEvent::EVENT_TYPE:
                $this->successfulRegistration($to, $data);
                break;
            case SendActivationEmail::EVENT_TYPE:
                $this->sendActivationEmail($to, $data);
                break;
            default:
                break;
        }
    }

    /**
     * @param array $message
     */
    public function send(array $message): void
    {
        $message = json_encode($message);

        $this->queueService->add(self::QUEUE_NAME, $message);
    }

    /**
     * @param string $to
     * @param string $token
     * @throws Exception
     */
    protected function sendActivationEmail(string $to, string $token = '')
    {
        $message = [
            'action' => 'activation',
            'payload' => [
                'to' => $to,
                'token' => $token
            ]
        ];

        $this->send($message);
    }

    /**
     * @param string $to
     * @param string $name
     * @throws Exception
     */
    protected function successfulRegistration(string $to, string $name): void
    {
        $message = [
            'action' => 'register',
            'payload' => [
                'to' => $to,
                'name' => $name
            ]
        ];

        $this->send($message);

    }
}