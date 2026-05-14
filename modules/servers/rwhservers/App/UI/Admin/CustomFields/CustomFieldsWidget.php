<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields;

use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\ProductConfig\Providers\Config;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Others\ConfigurableOptionsWidget;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\UI\ConfigurableOption\Buttons\AddCustomFields;

class CustomFieldsWidget extends ConfigurableOptionsWidget implements AdminArea
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
    }
}
