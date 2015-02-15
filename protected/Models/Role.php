<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Role
 * @package App\Models
 * @property string $name
 * @property string $title
 * @property \T4\Core\Collection|\App\Models\User[] $users
 */
class Role
    extends Model
{

    protected static $schema = [
        'table' => '__user_roles',
        'columns' => [
            'name' => ['type' => 'string'],
            'title' => ['type' => 'string'],
        ],
        'relations' => [
            'users' => ['type' => self::MANY_TO_MANY, 'model' => User::class],
        ],
    ];

}