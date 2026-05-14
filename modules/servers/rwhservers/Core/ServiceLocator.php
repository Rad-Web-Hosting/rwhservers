<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\DependencyInjection\DependencyInjection;

/**
 * Class ServiceLocator
 * @package ModulesGarden\ProductsReseller\Server\rwhservers\Core
 * @TODO remove that class //MM
 */
class ServiceLocator extends DependencyInjection
{
    /**
     * @var bool
     * @TODO - move it to different class //MM
     */
    public static $isDebug = false;
}
