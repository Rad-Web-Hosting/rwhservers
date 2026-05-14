<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration\Addon\Deactivate;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration\Addon\AbstractAfter;

/**
 * Runs after addon deactivation
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class After extends AbstractAfter
{

    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {

        return $params;
    }
}
