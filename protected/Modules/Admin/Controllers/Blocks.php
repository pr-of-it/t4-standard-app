<?php

namespace App\Modules\Admin\Controllers;

use App\Components\Admin\Controller;
use App\Models\Block;
use T4\Core\Collection;
use T4\Dbal\QueryBuilder;

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

    public function actionSetupBlock($sectionId, $blockPath)
    {
        $query = new QueryBuilder();
        $query
            ->select('MAX(' . Block::getDbDriver()->quoteName('order') . ')')
            ->from(Block::getTableName())
            ->where('section=:section')
            ->params([':section' => $sectionId]);
        $maxOrder = (int)$this->app->db->default->query($query)->fetchScalar();

        $block = new Block();
        $block->section = $sectionId;
        $block->path = $blockPath;
        $block->template = '';

        $params = [];
        foreach ($this->app->config->blocks->{$blockPath}->options as $optionName => $options) {
            $params[$optionName] = $options->default;
        }
        $block->options = json_encode($params);
        $block->order = $maxOrder + 10;

        if (false !== $block->save()) {
            $this->data->id = $block->getPK();
            $this->data->result = true;
        } else {
            $this->data->result = false;
        }
    }

}