<?php

namespace App\Modules\Pages\Models;

use T4\Orm\Model;

class Page
    extends Model
{
    static protected $schema = [
        'columns' => [
            'title' => [
                'type' => 'string',
            ],
            'url' => [
                'type' => 'string',
            ],
            'template' => [
                'type' => 'string',
            ],
            'text' => [
                'type' => 'text',
                'length' => 'big',
            ],
            'order' => [
                'type' => 'int',
                'default' => 0
            ],
            'file' => [
                'type' => 'string',
            ],
        ],
        'relations' => [
            'files' => ['type' => self::HAS_MANY, 'model' => '\App\Modules\Pages\Models\File']
        ],
    ];

    static protected $extensions = ['tree'];

    public function getBreadCrumbs()
    {
        $ret = new Collection;
        foreach ($this->findAllParents() as $i => $parent) {
            if (0==$i)
                continue;
            $p = new Std;
            $p->url = $parent->url;
            $p->title = $parent->title;
            $ret[] = $p;
        }
        return $ret;
    }


}