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
        ]
    ],
];