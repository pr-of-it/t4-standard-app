<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class UserSession
 * @package App\Models
 * @property string $hash
 * @property string $userAgentHash
 * @property \App\Models\User $user
 */
class UserSession
    extends Model
{
    protected static $schema = [
        'table' => '__user_sessions',
        'columns' => [
            'hash' => ['type' => 'string'],
            'userAgentHash' => ['type' => 'string'],
        ],
        'relations' => [
            'user' => ['type' => self::BELONGS_TO, 'model' => User::class],
        ],
    ];

}