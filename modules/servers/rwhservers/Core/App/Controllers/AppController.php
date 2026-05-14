<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ServiceLocator;

abstract class AppController
{
    public function runController($callerName, $params)
    {
        $controller = $this->getControllerInstanceClass($callerName, $params);

        $controllerInstance = ServiceLocator::call($controller);

        $result = $controllerInstance->runExecuteProcess($params);

        return $result;
    }
}
