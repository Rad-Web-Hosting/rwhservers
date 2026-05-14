<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\AppControllers;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Interfaces\AppController;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Instances\Http\AdminPageController;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Instances\Http\ClientPageController;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\AppParams;

class Http extends \ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\AppController implements AppController
{
    use AppParams;

    public function getControllerInstanceClass($callerName, $params)
    {
        //todo
        $functionName = str_replace($this->getModuleName() . '_', '', $callerName);
        switch ($functionName)
        {
            //HTTP controllers
            case 'output':
                return AdminPageController::class;
            case 'clientarea':
                return ClientPageController::class;
        }

        return null;
    }

    public function getModuleName()
    {
        return $this->getAppParam('systemName');
    }
}
