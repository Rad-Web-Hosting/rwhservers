<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Requirements\Instances;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Requirements\RequirementsList;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Requirements\RequirementInterface;

/**
 * Description of Classes
 *
 * @author INBSX-37H
 */
abstract class Classes extends RequirementsList implements RequirementInterface
{
    const CLASS_NAME = 'className';

    final public function getHandler()
    {
        return \ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Requirements\Handlers\Classes::class;
    }
}
