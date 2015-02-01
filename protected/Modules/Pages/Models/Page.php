<?php

namespace App\Modules\Pages\Models;

use T4\Core\Collection;
use T4\Core\Std;
use T4\Fs\Helpers;
use T4\Http\Uploader;
use T4\Mvc\Application;
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

    public function uploadFiles($formFieldName)
    {
        $request = Application::getInstance()->request;
        if (!$request->existsFilesData() || !$request->isUploadedArray($formFieldName))
            return $this;

        $uploader = new Uploader($formFieldName);
        $uploader->setPath('/public/pages');
        foreach ($uploader() as $uploadedFilePath) {
            if (false !== $uploadedFilePath)
                $this->files->append(new File(['file' => $uploadedFilePath]));
        }
        return $this;
    }

    public function beforeDelete()
    {
        $this->deleteFiles();
        $this->files = new Collection();
        return parent::beforeDelete();
    }

    public function deleteFiles()
    {
        if (!empty($this->files)) {
            try {
                foreach ($this->files as $file) {
                    Helpers::removeFile(ROOT_PATH_PUBLIC . $file->file);
                }
            } catch (\T4\Fs\Exception $e) {
                return false;
            }
        }
        return true;
    }

}