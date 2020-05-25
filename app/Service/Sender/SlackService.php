<?php

namespace App\Service\Sender;

use App\Model\User;
use JoliCode\Slack\Api\Model\ObjsMessage;
use TelegramBot\Api\BotApi;

/**
 * Class SlackService
 * @package App\Service\Sender
 */
class SlackService implements SenderInterface
{
    public function send(User $user, string $message)
    {
        $client = \JoliCode\Slack\ClientFactory::create($user->providerKey);

        $messageObject = new ObjsMessage();
        $messageObject->setText($message);

        $client->chatPostMessage([
            'text'=>$message,
            'channel'=>$user->chatId
        ]);
    }

}
