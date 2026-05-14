<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Instances\AddonController;

/**
 * Class MetaData
 *
 * @author <slawomir@modulesgarden.com>
 */
class MetaData extends AddonController
{
    public function execute($params = null)
    {
        return [
            'DisplayName'    => 'rwhservers',
            'RequiresServer' => true
        ];
    }
}
