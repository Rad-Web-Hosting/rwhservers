<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Graphs;

/**
 * Description of EmptyGraph
 *
 * @author inbs
 */
class Pie extends EmptyGraph
{
    protected $id = 'pieGraph';
    protected $name = 'pieGraph';

    public function initContent()
    {
        parent::initContent();
        $this->setChartTypeToPie();
    }
}
