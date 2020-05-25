<?php

namespace App\Service\Sender;

use App\Model\User;
use Illuminate\Support\Collection;

/**
 * Class SenderFactory
 * @package App\Service\Sender
 */
class SenderFactory
{
    /**
     * @var Collection
     */
    private Collection $serviceClosureCollection;

    /**
     * SenderFactory constructor.
     * @param Collection $senderCollection
     */
    public function __construct(Collection $senderCollection)
    {
        $this->serviceClosureCollection = $senderCollection;
    }


    /**
     * @param User $user
     * @param string $message
     */
    public function send(User $user, string $message){
        /**
         * @var SenderInterface $sender
         */
        $sender = $this->serviceClosureCollection->get($user->provider)();

        $sender->send($user, $message);
    }
}
