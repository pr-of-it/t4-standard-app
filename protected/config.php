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
        'method' => 'php',
    ],
    'extensions' => [
        'jquery' => [
        ],
        'bootstrap' => [
			'location' => 'local',
			'theme' => 'flatly',
        ],
        'ckeditor' => [
            'location' => 'local'
        ],
        'sxgeo' => [
        ],
    ],
];