<?php
$hookManager->register(
    function ($args) {
        try
        {
            if(!\ModulesGarden\ProductsReseller\Server\rwhservers\App\Helpers\ResellerModuleChecker::isProperProduct($args['pid']))
            {
                return;
            }
            //todo product/module chceck
            $configController = new  \ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Instances\Addon\ConfigOptions();
            $configController->runExecuteProcess($args);
        }
        catch (\Exception $exc)
        {
            //do nothing on save
        }
    },
    100
);
