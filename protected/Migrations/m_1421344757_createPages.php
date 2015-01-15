<?php

namespace App\Migrations;

use App\Modules\Pages\Models\Page;
use T4\Orm\Migration;

class m_1421344757_createPages
    extends Migration
{

    public function up()
    {
        $this->createTable('pages', [
            'url' => ['type' => 'string'],
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
        ], [
            ['type' => 'unique', 'columns' => ['url']],
        ]);

        $page = new Page();
        $page->url = 'index';
        $page->title = 'Главная страница';
        $page->text = 'Добро пожаловать на ваш новый сайт!';
        $page->save();
    }

    public function down()
    {
        $this->dropTable('pages');
    }

}