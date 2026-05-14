<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;

class SubmoduleController
{
    public static function call($function, $params)
    {
        $object = self::getCurrentModuleObject($params);
        return $object->{$function}($params);
    }

    public static function getCurrentModuleObject($params)
    {
        $resellerProductType = (new Repository())->getProductSettings($params['pid'])['resellerProductType'];
        $submodule           = str_replace(' ', '', $resellerProductType);
        $className           = "\\ModulesGarden\\ProductsReseller\\Server\\rwhservers\\Submodules\\{$submodule}\\{$submodule}";

        if (class_exists($className))
        {
            $object = new $className;
        }
        else
        {
            if (strpos(strtolower($submodule), 'ssl') != false)
            {
                $object = new DefaultSSLSubmodule();
            }
            else
            {
                $object = new DefaultSubmodule();
            }
        }
        return $object;
    }
}
