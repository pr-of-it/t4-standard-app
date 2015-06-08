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
            ], [
                ['columns' => ['email']],
            ]);

            $this->createTable('__user_roles', [
                'name' => ['type' => 'string'],
                'title' => ['type' => 'string'],
            ], [
                ['type' => 'unique', 'columns' => ['name']]
            ]);

            $this->createTable('__user_roles_to___users', [
                '__user_id' => ['type' => 'link'],
                '__role_id' => ['type' => 'link'],
            ]);

            $roleAdminId = $this->insert('__user_roles', [
                'name' => 'admin',
                'title' => 'Администратор',
            ]);

            $userAdminId = $this->insert('__users', [
                'email' => 'admin@t4.org',
                'password' => \T4\Crypt\Helpers::hashPassword('123456'),
            ]);

            $this->insert('__user_roles_to___users', [
                '__user_id' => $userAdminId,
                '__role_id' => $roleAdminId,
            ]);

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
        $this->dropTable('__user_sessions');
        $this->dropTable('__user_roles_to___users');
        $this->dropTable('__user_roles');
        $this->dropTable('__users');
        $this->dropTable('__blocks');
    }

}