<?php

return [
    'db' => [
        'default' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'dbname' => 'standard',
            'user' => 'root',
            'password' => '',
        ]
    ],
    'auth' => [
        'expire' => 31536000 // 1 year
    ],
    'mail' => [
        'method' => 'smtp',
        'host' =>'smtp.gmail.com',
        'auth' =>[
            'username'=>'',
            'password'=> ''
        ],
        'port' => '587',
        'secure' => 'tls',
        ],
    'extensions' => [
        'jquery' => [
        ],
        'bootstrap' => [
			'location' => 'local',
            'theme' => 'cerulean',
        ],
        'ckeditor' => [
            'location' => 'local',
        ],
        'ckfinder' => [
            'autoload' => false,
        ],
        'jstree' => [
            'autoload' => false,
        ],
        'sxgeo' => [
        ],
        'captcha' => [
            'show' => true,
        ],
    ],
];