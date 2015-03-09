<?php

return [

    '///Login' => [
        'title' => 'Форма входа',
        'desc' => 'Форма входа на сайт',
        'options' => [],
    ],
    '///Register' => [
        'title' => 'Форма регистрации',
        'desc' => 'Форма регистрации пользователя',
        'options' => [],
    ],

    '/News//' => [
        'title' => 'Главная страница новостей',
        'desc' => 'Главная страница модуля Новости в блоке',
        'options' => [],
    ],
    '/News//One' => [
        'title' => 'Новость',
        'desc' => 'Выбранная по ID новость',
        'options' => [],
    ],

    '/Pages//PageByUrl' => [
        'title' => 'Страница сайта',
        'desc' => 'Выводит выбранную страницу',
        'options' => [
            'id' => [
                'title' => 'Страница',
                'type' => 'select:tree',
                'model' => \App\Modules\Pages\Models\Page::class,
                'default' => 1,
            ]
        ],
        'cache' => ['time' => 60],
    ],

    '/Maps//Map' => [
        'title' => 'Карта',
        'desc' => 'Блок с заданной картой',
        'options' => [
            'id' => [
                'title' => 'Карта',
                'type' => 'select:model',
                'model' => \App\Modules\Maps\Models\Map::class,
                'default' => 1,
            ]
        ],
        'cache' => ['time' => 60],
    ],

    '/Menu//' => [
        'title'=> 'Меню сайта',
        'desc' => 'Главное меню',
        'options' => [],
        'cache' => ['time' => 60],
    ],

    '/Contact//' => [
        'title'=> 'Форма обратной связи',
        'desc' => 'Форма обратной связи модуля Контакты',
        'options' => [],
    ],

    '/Catalogs//' => [
        'title'=> 'форма каталога',
        'desc' => 'каталоги',
        'options' => [],
        'cache' => ['time' => 60],
    ],

];