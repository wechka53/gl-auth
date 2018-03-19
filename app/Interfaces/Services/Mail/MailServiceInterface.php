<?php

namespace App\Interfaces\Services\Mail;

/**
 * Interface MailQueueServiceInterface
 *
 * @package App\Interfaces\Services
 */
interface MailServiceInterface
{
    /**
     * @param string $type
     * @param string $to
     * @param string|NULL $message
     * @param null $data
     */
    public function processMessage(string $type, string $to, string $message = null, $data = null): void;

    /**
     * @param array $message
     */
    public function send(array $message): void;
}