<?php

namespace App\Commands;

use App\Modules\Gallery\Models\Photo;
use T4\Console\Command;
use App\Modules\Gallery\Models\Album;
use T4\Core\Exception;


class Import
    extends Command
{


    public function actionPhotos()
    {

        /*
         * PHOTO Albums
         */

        $lvl = 0;
        $prt = 0;
        $lft = 1;
        $rgt = 2;

        $dataFileName = realpath(__DIR__ . DS . '..' . DS . '..' . DS . 'data' . DS . '_drb_photo_albums.csv');
        if (!is_readable($dataFileName))
            throw new Exception('Data file ' . $dataFileName . ' is not found or is not readable');
        $dataFile = fopen($dataFileName, 'r');

        $connection = Album::getDbConnection();
        $sql = 'INSERT INTO `' . Album::getTableName() . '` (`__id`, `title`, `__lft`, `__rgt`, `__lvl`, `__prt`) VALUES (:id, :title, :lft, :rgt, :lvl, :prt)';

        while ($row = fgetcsv($dataFile, 0, ',', '"', '"')) {
            $connection->execute($sql, [
                ':id' => $row[0],
                ':title' => $row[3],
                ':lft' => $lft,
                ':rgt' => $rgt,
                ':lvl' => $lvl,
                ':prt' => $prt,
            ]);
            $lft += 2;
            $rgt += 2;
        }

        /*
         * PHOTOS
         */

        $dataFileName = realpath(__DIR__ . DS . '..' . DS . '..' . DS . 'data' . DS . '_drb_photo_images.csv');
        if (!is_readable($dataFileName))
            throw new Exception('Data file ' . $dataFileName . ' is not found or is not readable');
        $dataFile = fopen($dataFileName, 'r');

        $sql = 'INSERT INTO `' . Photo::getTableName() . '` (`title`, `image`, `published`, `__album_id`) VALUES (:title, :image, :published, :album)';

        while ($row = fgetcsv($dataFile, 0, ',', '"', '"')) {


            $connection->execute($sql, [
                ':title' => $row[4],
                ':image' => $row[3],
                ':published' => date('Y-m-d H:i:s', $row[6]),
                ':album' => $row[1],
            ]);

        }

    }
}