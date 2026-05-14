<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\UI\ConfigurableOption;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Helpers\AlertTypesConstants;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Buttons\ButtonBase;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Buttons\ButtonModal;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Others\ConfigurableOptionsWidget;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\Config\PackageConfiguration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\Traits\ConfigurableOptionsConfig;
use ModulesGarden\ProductsReseller\Server\rwhservers\Packages\WhmcsService\UI\ConfigurableOption\Buttons\AddOptions;

class OptionsWidget extends ConfigurableOptionsWidget implements AdminArea
{
    use ConfigurableOptionsConfig;

    protected $id = 'optionsWidget';
    protected $name = 'optionsWidget';
    protected $title = 'optionsWidgetTitle';

    public function initContent()
    {
        $this->loadConfigurableOptionsList();
        $this->customTplVars['options'] = $this->configOptionsList;
        $this->addButton(AddOptions::class);
        $this->addInternalAlert('configurableOptionsInfo', AlertTypesConstants::INFO, AlertTypesConstants::SMALL);
    }

    protected function loadConfigurableOptionsList()
    {
        if (!$this->configOptionsList)
        {
            $packageConfiguration = new PackageConfiguration();

            $this->configOptionsList = $packageConfiguration->getConfigurationForResellerProduct()['configurableOptions'];
        }
    }

}
