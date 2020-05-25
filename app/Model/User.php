<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $chatId
 * @property string $providerKey
 * @property string $provider
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 *
 *
 * Class User
 * @package App\Model
 */
class User extends Model
{
}
