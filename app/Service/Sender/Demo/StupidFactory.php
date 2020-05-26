<?php

namespace App\Service\Sender\Demo;

use App\Model\User;
use App\Service\Sender\SenderInterface;
use App\Service\Sender\SlackService;
use App\Service\Sender\TelegramService;
use Psr\Container\ContainerInterface;

class StupidFactory
{
    private array $providerMap = [
        'telegram'=>TelegramService::class,
        'slack'=>SlackService::class
    ] ;

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
        $service = $this->container->get($this->providerMap[$user->provider]);
        $service->send($user, $message);
    }
}
