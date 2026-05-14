<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\DataTable\Filters\Helpers;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Builder\BaseContainer;

abstract class Filter extends BaseContainer implements FilterInterface
{
    protected $id = 'filter';
    protected $name = 'filter';
    protected $title = 'filterTitle';
}
