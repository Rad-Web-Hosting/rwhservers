<?php

use WHMCS\View\Menu\Item as MenuItem;

$hookManager->register(
    function (MenuItem $primarySidebar) {
        $isProperModule = \ModulesGarden\ProductsReseller\Server\rwhservers\App\Helpers\ResellerModuleChecker::isProperModule(__DIR__);
        if (!$isProperModule)
        {
            return;
        }

        $actions = $primarySidebar->getChild('Service Details Actions');

        if (is_a($actions, '\WHMCS\View\Menu\Item'))
        {
            $actions->removeChild('Change Password');
            $actions->removeChild('Custom Module Button serverInformation');
            $actions->removeChild('Custom Module Button generalInformation');
            $actions->removeChild('Custom Module Button locationInformation');
        }

    },
    100
);
