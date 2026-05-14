<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Helpers;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Whmcs\Product;
use function ModulesGarden\ProductsReseller\Server\rwhservers\Core\Helper\sl;

class ResellerModuleChecker
{
    /**
     * Applicable for Reseller Product specific hooks
     * @param string $dir
     * @return bool
     */
    public static function isProperModule(string $dir): bool
    {
        $moduleName = self::extractResellerModuleFromDir($dir);
        $request = sl('request');

        $hosting = \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Whmcs\Hosting::where('id', $request->get('id'))->first();
        if (!$hosting)
        {
            return false;
        }
        $resellerProductType = (new Repository())->getProductSettings($hosting->packageid)['resellerProductType'];

        if (strpos(strtolower($resellerProductType), strtolower($moduleName)) === false)
        {
            return false;
        }
        return true;
    }

    protected static function extractResellerModuleFromDir(string $dir)
    {
        $directory = dirname($dir, 2);
        $exploded = explode(DIRECTORY_SEPARATOR, $directory);
        return end($exploded);
    }

    /**
     * Applicable only for main rwhservers hooks (from Core/App/Hooks)
     * @return bool
     */
    public static function isProperProduct(?int $pid): bool
    {
        $product = Product::find($pid);
        $exp = explode(DIRECTORY_SEPARATOR, dirname(__DIR__,2));
        return $product->servertype === end($exp);
    }

}