<?php

namespace App\Modules\Gallery\Models;


use T4\Orm\Model;

class Album
      extends Model {

    protected static $schema = [
        'columns' => [
            'title' => ['type'=>'string'],
            'published' => ['type'=>'datetime'],

        ],
        'relations' => [
            'photos' => ['type' => self::HAS_MANY, 'model' => Photo::class],
        ]
    ];

    static protected $extensions = ['tree'];

    public function beforeSave()
    {
        if ($this->isNew()) {
            $this->published = date('Y-m-d H:i:s', time());
        }

        return parent::beforeSave() ;
    }

    public function afterDelete()
    {
        $this->photos->delete();
    }

    public function albumCover($id)
    {
        $this->data->cover = Photo::findByQuery('SELECT image FROM photos WHERE __album_id='.$id.'AND __id=LAST_INSERT_ID');
    }

}