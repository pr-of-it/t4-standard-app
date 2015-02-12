<?php

namespace App\Models;

use App\Components\Exception;
use T4\Orm\Model;

/**
 * Class User
 * @package App\Models
 * @property string $email
 * @property string $password
 * @property \T4\Core\Collection $roles
 */
class User
    extends Model
{
    public static $schema = [
        'table' => '__users',
        'columns' => [
            'email'     => ['type'=>'string'],
            'password'  => ['type'=>'string'],
        ],
        'relations' => [
            'roles' => ['type' => self::MANY_TO_MANY, 'model' => Role::class],
        ]
    ];

    protected function validateEmail($email)
    {
        if (empty($email))
            throw new Exception('Пустой e-mail');
    }

    public function getRoleNames()
    {
        return $this->roles->collect('name');
    }

    public function hasRole($roleName)
    {
        return in_array($roleName, $this->getRoleNames());
    }

}