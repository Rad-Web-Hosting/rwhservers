<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\CpanelExtended;

use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\Cpanel\Cpanel;


class CpanelExtended extends Cpanel
{
    public function __call(string $name, array $arguments)
    {
        return sprintf('Method %s does not exist', $name);
    }
}
