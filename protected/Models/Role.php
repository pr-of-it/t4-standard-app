<?php

namespace App\Models;

use T4\Orm\Model;

class Role
    extends Model
{

    public static $schema = [
        'table' => '__user_roles',
        'columns' => [
            'name' => ['type' => 'string'],
            'title' => ['type' => 'string'],
        ],
        'relations' => [
            'users' => ['type' => self::HAS_MANY, 'model' => User::class],
        ],
    ];

} 