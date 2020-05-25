<?php

namespace App\Service\Sender;

use App\Model\User;
use TelegramBot\Api\BotApi;

class TelegramService implements SenderInterface
{
    public function send(User $user, string $message)
    {
        $telegram = new BotApi($user->providerKey);
        $telegram->sendMessage($user->chatId, $message);
    }
}
