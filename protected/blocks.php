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

    '/Pages//PageById' => [
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
    '/Pages//PageByUrl' => [
        'title' => 'Страница сайта',
        'desc' => 'Выводит выбранную страницу по URL',
        'options' => [
            'url' => [
                'title' => 'URL',
                'type' => 'string',
                'default' => 'index',
            ]
        ],
        'cache' => ['time' => 60],
    ],

    '/Maps//Map' => [
        'title' => 'Карта',
        'desc' => 'Выводит блок с картой по ее ID',
        'options' => [],
    ],

    '/Menu//' => [
        'title'=> 'Меню сайта',
        'options' => [],
        'cache' => ['time' => 60],
    ],

];