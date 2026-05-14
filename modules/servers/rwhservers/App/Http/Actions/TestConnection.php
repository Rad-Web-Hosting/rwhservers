<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;

use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\TestConnectionRequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Instances\AddonController;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\Lang;

/**
 * Class MetaData
 *
 */
class TestConnection extends AddonController
{
    public function execute($params = null)
    {
        try
        {
            $call       = new  TestConnectionRequest(Configuration::create($params), []);
            $result     = $call->process();
            $isSuccess  = $result['result'] === 'success';
            $errMessage = $result['error'];
        }
        catch (\Exception $e)
        {
            $isSuccess  = false;
            $errMessage = "API Error: " . $e->getMessage();
        }

        return [
            'success' => $isSuccess,
            'error'   => $errMessage
        ];
    }
}
