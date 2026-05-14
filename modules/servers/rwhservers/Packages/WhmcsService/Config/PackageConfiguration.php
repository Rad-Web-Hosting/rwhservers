<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\Config;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Packages\BasePackageConfiguration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Packages\PackageConfigurationConst;

class PackageConfiguration extends BasePackageConfiguration
{
    const CONFIGURATION =
        [
            PackageConfigurationConst::PACKAGE_NAME => 'WhmcsService',
            PackageConfigurationConst::VERSION      => '1.0.0'
        ];

    public static function getPackageName()
    {
        return self::CONFIGURATION[PackageConfigurationConst::PACKAGE_NAME];
    }
}
