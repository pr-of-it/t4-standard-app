<?php

return [
    '///' => [
        'name' => 'Main page block'
    ],
    '///Login' => [
        'name' => 'Login block'
    ],

    '/Pages//PageByUrl' => [
        'name' => 'Страница сайта',
        'desc' => 'Выводит выбранную страницу в заданном шаблоне',
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
        'name' => 'Карта',
        'desc' => 'Выводит блок с картой по ее ID',
    ],

    '/Menu//Menu' => [
        'name'=> 'Menu'
    ],

    '///Registry' => [
        'name' => 'Registry block'
    ],
];