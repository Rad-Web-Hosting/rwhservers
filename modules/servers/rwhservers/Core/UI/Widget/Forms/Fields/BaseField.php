<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\Forms\Fields;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Builder\BaseContainer;

/**
 * BaseField controler
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class BaseField extends BaseContainer
{

    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Traits\Field;

    protected $id = 'baseField';
    protected $name = 'baseField';
    protected $class = ['lu-form-check lu-m-b-2x'];

    protected $htmlAttributes = [
        '@keyup.enter' => 'submitFormByField($event)'
    ];
}
