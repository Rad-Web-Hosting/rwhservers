<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Others;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Builder\BaseContainer;

/**
 * ModuleDescription
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class ModuleDescription extends BaseContainer
{
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Traits\Description;

    protected $name = 'moduleDescription';
    protected $id = 'moduleDescription';
    protected $title = 'moduleDescription';
    protected $class = ['info'];
}
