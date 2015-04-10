<?php

namespace App\Modules\Gallery\Models;


use T4\Orm\Model;

class Album
    extends Model
{

    protected static $schema = [
        'columns' => [
            'title' => ['type' => 'string'],
            'published' => ['type' => 'datetime'],

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

        return parent::beforeSave();
    }

    public function afterDelete()
    {
        $this->photos->delete();
    }

    public function getAlbumImage()
    {
        if (is_array($this->photos->collect('published'))) {
            $key = array_search(max($this->photos->collect('published')), $this->photos->collect('published'));
            return $this->photos->collect('image')[$key];
        } else {
            return $this->photos->collect('image');
        }

    }

    public function countPhotos()
    {
        return count($this->photos->collect('image'));
    }

}