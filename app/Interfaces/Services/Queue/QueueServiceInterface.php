<?php

namespace App\Interfaces\Services\Queue;

/**
 * Interface QueueServiceInterface
 * @package App\Interfaces\Queue
 */
interface QueueServiceInterface
{
    /**
     * @param string $queueName
     * @param string $message
     */
    public function add(string $queueName, string $message): void;
}