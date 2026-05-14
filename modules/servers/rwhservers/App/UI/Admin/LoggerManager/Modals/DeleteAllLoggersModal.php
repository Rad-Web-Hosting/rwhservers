<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\LoggerManager\Modals;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Modals\BaseModal;

use \ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\LoggerManager\Forms\DeleteAllLoggerForm;

/**
 * DOE AddCategoryModal controler
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class DeleteAllLoggersModal extends BaseModal implements AdminArea
{
    protected $id = 'deleteAllLoggersModal';
    protected $name = 'deleteAllLoggersModal';
    protected $title = 'deleteAllLoggersModal';

    public function initContent()
    {
        $this->addForm(new DeleteAllLoggerForm());
    }
}
