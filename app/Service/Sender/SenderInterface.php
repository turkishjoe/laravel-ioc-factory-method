<?php

namespace App\Service\Sender;

use App\Model\User;

/**
 * Interface SenderInterface
 * @package App\Service\Sender
 */
interface SenderInterface
{
    /**
     * @param User $user
     * @param string $message
     * @return mixed
     */
    public function send(User $user, string $message);
}
