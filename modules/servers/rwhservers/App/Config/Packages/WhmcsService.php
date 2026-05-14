<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Config\Packages;

use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\ProductConfig\Providers\Config;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Packages\AppPackageConfiguration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\Lang;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Traits\RequestObjectHandler;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\Config\Enum;

class WhmcsService extends AppPackageConfiguration
{
    use RequestObjectHandler, Lang;

    const APP_CONFIGURATION =
        [
            self::PACKAGE_STATUS => self::PACKAGE_STATUS_ACTIVE,

            Enum::CUSTOM_FIELDS => [
                [
                    Enum::FIELD_NAME       => 'serviceId|Service ID',
                    Enum::FIELD_TYPE       => Enum::FIELD_TYPE_TEXT_BOX,
                    Enum::FIELD_ADMIN_ONLY => Enum::FIELD_ADMIN_ONLY_ON
                ],
                [
                    Enum::FIELD_NAME       => 'orderId|Order ID',
                    Enum::FIELD_TYPE       => Enum::FIELD_TYPE_TEXT_BOX,
                    Enum::FIELD_ADMIN_ONLY => Enum::FIELD_ADMIN_ONLY_ON
                ],
            ],

            Enum::CONFIGURABLE_OPTIONS => [
            ]
        ];
}
