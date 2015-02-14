<?php
/**
 * Created by PhpStorm.
 * User: Вера
 * Date: 03.02.2015
 * Time: 19:40
 */

namespace App\Modules\Menu\Models;


use T4\Orm\Model;

class Menu
    extends Model
{
    static protected $schema = [
        'table' => 'menu',
        'columns' => [
            'title' => [
                'type' => 'string',
            ],
            'url' => [
                'type' => 'string',
            ],
        ],
    ];

    static protected $extensions = ['tree'];

}