<?php

namespace App\Services\Queue;


use App\Interfaces\Services\Queue\QueueServiceInterface;
use Mookofe\Tail\Facades\Tail;

/**
 * Class QueueService
 * @package App\Services\Queue
 */
class QueueService implements QueueServiceInterface
{

    /**
     * @param string $queueName
     * @param string $message
     */
    public function add(string $queueName, string $message): void
    {
        Tail::add($queueName, $message);
    }
}