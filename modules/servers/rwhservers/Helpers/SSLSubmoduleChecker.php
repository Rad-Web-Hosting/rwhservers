<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\Helpers;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Whmcs\Hosting;
use WHMCS\Product\Product;

class SSLSubmoduleChecker
{
    public static function check(string $id): bool
    {
        $pid                 = Hosting::where('id', $id)->first()->packageid;
        $resellerProductType = (new Repository())->getProductSettings($pid)['resellerProductType'];
        $class               = "ModulesGarden\\ProductsReseller\\Server\\rwhservers\\Submodules\\{$resellerProductType}\\{$resellerProductType}";
        return method_exists($class, "sslStepOne");
    }

    public static function checkByName(string $id): bool
    {
        $pid                 = Hosting::where('id', $id)->first()->packageid;
        $resellerProductType = (new Repository())->getProductSettings($pid)['resellerProductType'];
        return strpos(strtolower($resellerProductType), 'ssl') !== false;
    }
}