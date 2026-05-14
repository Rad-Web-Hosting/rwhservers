<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields\Buttons;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Buttons\ButtonCreate;
use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields\Modals\AddCustomFields as AddCustomFieldsModal;

class AddCustomFields extends ButtonCreate implements AdminArea
{
    protected $id = 'addCustomFieldsButton';
    protected $name = 'addCustomFieldsButton';
    protected $title = 'addCustomFieldsButtonTitle';

    public function initContent()
    {
        $this->replaceClass('lu-btn--primary', 'lu-btn--success');

        $modal = new AddCustomFieldsModal();
        $this->initLoadModalAction($modal);
    }

}