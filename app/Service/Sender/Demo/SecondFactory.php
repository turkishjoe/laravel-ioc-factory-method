<?php

namespace App\Service\Sender\Demo;

use App\Model\User;
use App\Service\Sender\SenderInterface;
use App\Service\Sender\SlackService;
use App\Service\Sender\TelegramService;

class SecondFactory
{
    private array $providerMap = [
        'telegram'=>TelegramService::class,
        'slack'=>SlackService::class
    ] ;

    private $dependency1;
    private $dependency2;

    public function __construct($dependency1, $dependency2)
    {
        $this->dependency1 = $dependency1;
        $this->dependency2 = $dependency2;
    }

    /**
     * @param User $user
     * @param string $message
     */
    public function send(User $user, string $message){
        //TODO: 100500 валидации и exception

        /**
         * @var SenderInterface $service
         */
        $service = new $this->providerMap[$user->provider]($dependecy1, $dependecy2);
        $service->send($user, $message);
    }
}
