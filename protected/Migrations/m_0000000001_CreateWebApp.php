<?php

namespace App\Migrations;

use App\Models\Role;
use App\Models\User;
use T4\Orm\Migration;

class m_0000000001_CreateWebApp
    extends Migration
{

    public function up()
    {
        if (!$this->existsTable('__blocks')) {
            $this->createTable('__blocks', [
                    'section'   => ['type'=>'int'],
                    'path'      => ['type'=>'string'],
                    'template'  => ['type'=>'string'],
                    'options'   => ['type'=>'text'],
                    'order'     => ['type'=>'int'],
                ], [
                    ['columns'=>['section']],
                    ['columns'=>['order']],
                ]
            );
        };

        if (!$this->existsTable('__users')) {

            $this->createTable('__users', [
                'email'     => ['type'=>'string'],
                'password'  => ['type'=>'string'],
                '__role_id' => ['type' => 'link'],
            ], [
                ['columns' => ['email']],
            ]);

            $this->createTable('__user_roles', [
                'name' => ['type' => 'string'],
                'title' => ['type' => 'string'],
            ], [
                ['type' => 'unique', 'columns' => ['name']]
            ]);

            $role = new Role();
            $role->name = 'admin';
            $role->title = 'Администратор';
            $role->save();

            $user = new User();
            $user->email = 'admin@t4.org';
            $user->password = \T4\Crypt\Helpers::hashPassword('123456');
            $user->role = $role;
            $user->save();

            $this->createTable('__user_sessions', [
                'hash'          => ['type'=>'string'],
                '__user_id'     => ['type'=>'link'],
                'userAgentHash' => ['type'=>'string'],
            ], [
                'hash'  => ['columns'=>['hash']],
                'user'  => ['columns'=>['__user_id']],
                'ua'    => ['columns'=>['userAgentHash']],
            ]);

        }

    }

    public function down()
    {
        return false;
    }

}