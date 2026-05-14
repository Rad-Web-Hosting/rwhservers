<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\ProductConfig\Sections;

use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields\Buttons\AddCustomFields;
use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\ProductConfig\Providers\Config;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Others\CustomFieldsWidget as CustomFieldsWidgetBase;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\UI\ConfigurableOption\Buttons\AddOptions;

class CustomFieldsWidget extends CustomFieldsWidgetBase implements AdminArea
{
    protected $id = 'resellerCustomFields';
    protected $name = 'resellerCustomFields';
    protected $title = 'resellerCustomFieldsTitle';

    public function initContent()
    {
        $provider = new Config();
        $provider->reload();

        $this->customTplVars['customFields'] = $provider->getCustomFieldsForResellerProduct();

        $this->addButton(AddCustomFields::class);
        $this->addInternalAlert('customFieldsInfo', AlertTypesConstants::INFO, AlertTypesConstants::SMALL);
    }
}
