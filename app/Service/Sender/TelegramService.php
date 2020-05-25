<?php

namespace App\Service\Sender;

use App\Model\User;
use TelegramBot\Api\BotApi;

class TelegramService implements SenderInterface
{
    public function send(User $user, string $message)
    {
        $telegram = new BotApi($user->notificationKey);
        $telegram->sendMessage($user->chatId, $message);
    }
}
