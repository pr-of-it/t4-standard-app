<?php

return [

    '///Login' => [
        'title' => 'Форма входа',
        'desc' => 'Форма входа на сайт',
    ],
    '///Register' => [
        'title' => 'Форма регистрации',
        'desc' => 'Форма регистрации пользователя',
    ],

    '/News//' => [
        'title' => 'Главная страница новостей',
        'desc' => 'Главная страница модуля Новости в блоке',
    ],
    '/News//One' => [
        'title' => 'Новость',
        'desc' => 'Выбранная по ID новость',
    ],

    '/Pages//PageByUrl' => [
        'title' => 'Страница сайта',
        'desc' => 'Выводит выбранную страницу',
        'options' => [
            'url' => [
                'title' => 'URL',
                'type' => 'select',
                'model' => 'App\Modules\Pages\Models\Page',
                'default' => 'index',
            ]
        ],
        'cache' => ['time' => 60],
    ],

    '/Maps//Map' => [
        'title' => 'Карта',
        'desc' => 'Выводит блок с картой по ее ID',
    ],

    '/Menu//' => [
        'title'=> 'Меню сайта',
        'cache' => ['time' => 60],
    ],

];