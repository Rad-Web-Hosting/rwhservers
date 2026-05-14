<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Builder\BaseContainer;

class HookAdapter extends BaseContainer
{
    protected $name = 'hookAdapter';
    protected $data = [];
    protected $adaptId = '';

    public function adapt()
    {
        return $this->adaptId;
    }
}