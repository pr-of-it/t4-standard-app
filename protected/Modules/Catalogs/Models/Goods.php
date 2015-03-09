<?php


namespace App\Modules\Catalogs\Models;

use T4\Core\Exception;
use T4\Fs\Helpers;
use T4\Http\Uploader;
use T4\Mvc\Application;
use T4\Orm\Model;

class Goods
    extends Model
{
    static protected $schema = [
        'columns' => [
        'title'     => ['type'=>'string'],
        'description'  => ['type'=>'text'],
        'image' => ['type' =>'string ','default'=>''],
        'id_catalog' => ['type' => 'link'],
        ],
        'relations' => [
            'catalog' => ['type' => self::BELONGS_TO, 'model' => catalog::class],
        ]
    ];

    public function uploadImage($formFieldName)
    {
        $request = Application::getInstance()->request;
        if (!$request->existsFilesData() || !$request->isUploaded($formFieldName) || $request->isUploadedArray($formFieldName))
            return $this;

        try {
            $uploader = new Uploader($formFieldName);
            $uploader->setPath('/public/news/stories/images');
            $image = $uploader();
            if ($this->image)
                $this->deleteImage();
            $this->image = $image;
        } catch (Exception $e) {
            $this->image = null;
        }
        return $this;
    }

    public function beforeSave()
    {
        if ($this->isNew()) {
            $this->published = date('Y-m-d H:i:s', time());
        }
        return true;
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function deleteImage()
    {
        if ($this->image) {
            try {
                $this->image = '';
                Helpers::removeFile(ROOT_PATH_PUBLIC . $this->image);
            } catch (\T4\Fs\Exception $e) {
                return false;
            }
        }
        return true;
    }


} 