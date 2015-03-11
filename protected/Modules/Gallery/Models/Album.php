<?php

namespace App\Modules\Gallery\Models;


use T4\Orm\Model;

class Album
      extends Model {

    protected static $schema = [
        'table'=>'album',
        'columns' => [
            'title' => ['type'=>'string'],
            'a_published' => ['type'=>'datetime'],

        ],
        'relations' => [
            'photos' => ['type' => self::HAS_MANY, 'model' => Photo::class]
        ]
    ];

    public function beforeSave()
    {
        if ($this->isNew()) {
            $this->a_published = date('Y-m-d H:i:s', time());
        }
        return true;
    }

    public function afterDelete()
    {
        $this->photos->delete();
    }
}