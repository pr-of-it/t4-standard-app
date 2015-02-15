<?php

namespace App\Modules\Admin\Controllers;

use App\Components\Admin\Controller;
use App\Models\Block;
use T4\Core\Collection;

class Blocks
    extends Controller
{

    public function actionDefault()
    {
        $this->data->sections = $this->app->config->sections;
        $this->data->blocksAvailable = $this->app->config->blocks;

        $installed = Block::findAll(['order' => Block::getDbDriver()->quoteName('order')]);
        $this->data->blocksInstalled = new Collection();
        foreach ($installed as $block) {
            $this->data->blocksInstalled[$block->section][] = $block;
        }
    }

}