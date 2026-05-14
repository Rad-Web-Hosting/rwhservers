<?php

if (!class_exists('\ModulesGarden\ProductsReseller\Server\rwhservers\Core\HandlerError\WhmcsErrorManagerWrapper'))
{
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'HandlerError' . DIRECTORY_SEPARATOR . 'WhmcsErrorManagerWrapper.php';
}

\ModulesGarden\ProductsReseller\Server\rwhservers\Core\HandlerError\WhmcsErrorManagerWrapper::setErrorManager($errMgmt);
