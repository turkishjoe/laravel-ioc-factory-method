<?php

namespace App\Service\Sender\Demo;

use App\Model\User;
use App\Service\Sender\SenderInterface;
use App\Service\Sender\SlackService;
use App\Service\Sender\TelegramService;
use Psr\Container\ContainerInterface;

class NotSooStupidFactory
{
    /**
     * @var TelegramService $telegramService
     */
    private $telegramService;

    /**
     * @var SlackService $slackService
     */
    private $slackService;

    public function __construct(
        TelegramService $telegramService,
        SlackService $slackService
    )
    {
        $this->telegramService = $telegramService;
        $this->slackService = $slackService;
    }

    /**
     * @param User $user
     * @param string $message
     */
    public function send(User $user, string $message){
        //TODO: 100500 валидации и exception

        if($user->provider == 'telegram'){
            $service = $this->telegramService;
        }else{
            $service = $this->slackService;
        }

        $service->send($user, $message);
    }
}
