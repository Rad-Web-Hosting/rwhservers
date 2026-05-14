<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Forms;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AjaxElementInterface;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\FormInterface;

/**
 * BaseForm controler
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class BaseAutoSaveFormExtSections extends BaseStandaloneForm implements AjaxElementInterface, FormInterface
{
    protected $id = 'baseAutoSaveFormExtSections';
    protected $name = 'baseAutoSaveFormExtSections';

}
