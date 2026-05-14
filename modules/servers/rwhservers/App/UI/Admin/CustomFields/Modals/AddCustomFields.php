<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields\Modals;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Modals\BaseEditModal;
use ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\CustomFields\Forms\AddCustomFields as AddCustomFieldsForm;

class AddCustomFields extends BaseEditModal implements AdminArea
{
    protected $id = 'addCustomFieldsModal';
    protected $name = 'addCustomFieldsModal';
    protected $title = 'addCustomFieldsModalTitle';

    public function initContent()
    {
        $form = new AddCustomFieldsForm();
        $this->addForm($form);
    }
}
