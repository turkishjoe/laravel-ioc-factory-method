<?php

namespace App\Service\Sender\Demo;

use App\Model\User;
use App\Service\Sender\SenderInterface;
use App\Service\Sender\SlackService;
use App\Service\Sender\TelegramService;
use Psr\Container\ContainerInterface;

class SubContainer
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $message
     */
    public function get(string $id): SenderInterface{
        return $this->container->get($id);
    }
}
